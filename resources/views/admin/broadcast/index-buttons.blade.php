<form method="POST"
      action="{{url('/admin/broadcast/'.$id)}}"
      accept-charset="UTF-8"
      class="form-inline"
      style="display: inline-block">
    <input name="_method" type="hidden" value="DELETE">
    {{csrf_field()}}
    <button class="btn btn-danger btn-xs btn-delete-record"
            type="button">
        <span class="fui-trash"></span>
    </button>
</form>