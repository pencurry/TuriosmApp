@extends('layouts.app')
@section('autor')
<div class="col-12 col-xl-6">
                <div class="card no-b">
                    <div class="card-header white">
                        <div class="d-flex justify-content-between">
                            <div class="align-self-center">
                                <strong>Awesome Title</strong>
                            </div>
                            <div class="align-self-end float-right">
                                <ul class="nav nav-tabs card-header-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" id="w5--tab1" data-toggle="tab" href="#w5-tab1" role="tab" aria-controls="tab1" aria-expanded="true" aria-selected="true">Tab 1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="w5--tab2" data-toggle="tab" href="#w5-tab2" role="tab" aria-controls="tab2" aria-selected="false">Tab 2</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="w5--tab3" data-toggle="tab" href="#w5-tab3" role="tab" aria-controls="tab3" aria-selected="false">Tab 3</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body no-p">
                        <div class="tab-content">
                           
                            </div>
                            <div class="tab-pane fade text-center p-5" id="w5-tab2" role="tabpanel" aria-labelledby="w5-tab2">
                                <h4 class="card-title">Tab 2</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                            <div class="tab-pane fade text-center p-5" id="w5-tab3" role="tabpanel" aria-labelledby="w5-tab3">
                                <h4 class="card-title">Tab 3</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        
        @stop