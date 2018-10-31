<?php namespace App\Http\Controllers;
/**
 * Proneilrabbit - SMM Panel script
 * Broadcast By Proneil.com
 *
 */
use App\Ticket;
use Carbon\Carbon;
use App\Broadcast;use App\Package;use App\Service;
use App\TicketMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        $spentAmount = 0;
        $ordersPending = 0;
        $ordersCancelled = 0;
        $ordersCompleted = 0;
        $ordersPartial = 0;
        $ordersInProgress = 0;
        $orders = Auth::user()->orders;
        $ticketIds = Ticket::where(['user_id' => Auth::user()->id])->get()->pluck('id')->toArray();
        $unreadMessages = TicketMessage::where(['is_read' => 0])->whereIn('ticket_id', $ticketIds)->whereNotIn('user_id', [Auth::user()->id])->count();
        $supportTicketOpen = Ticket::where(['status' => 'OPEN', 'user_id' => Auth::user()->id])->count();

        foreach ($orders as $order) {
            if (strtolower($order->status) == 'pending') {
                $spentAmount += $order->price;
                $ordersPending++;
            } elseif (strtolower($order->status) == 'cancelled') {
                $ordersCancelled++;
            } elseif (strtolower($order->status) == 'completed') {
                $spentAmount += $order->price;
                $ordersCompleted++;
            } elseif (strtolower($order->status) == 'partial') {
                $spentAmount += $order->price;
                $ordersCompleted++;
            } elseif (strtolower($order->status) == 'inprogress') {
                $ordersInProgress++;
            }
        }		        $services = Service::where(['status' => 'ACTIVE', 'is_subscription_allowed' => 0])->get();        $packages = Package::where(['status' => 'ACTIVE'])->get();
        return view('dashboard', compact(
            'spentAmount',
            'ordersPending',
            'ordersCancelled',
            'ordersCompleted',
            'unreadMessages',
            'ordersPartial',
            'supportTicketOpen',
            'ordersInProgress',						'packages',			'services'
        ));


    }

    public function getBroadCast($cacheid)
    {
        $date1 = date_create("now", new \DateTimeZone('Asia/Kolkata'));
        $bCast = Broadcast::selectRaw('id, MsgTitle, MsgText, Icon')->where('id',">",$cacheid)->where('MsgStatus',1)->where('ExpireTime','>=',$date1)->orderBy('id', 'asc')->take(1)->get();
        return datatables()
            ->of($bCast)
            ->toJson();
    }
}