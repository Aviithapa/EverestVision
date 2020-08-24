@extends('admin.layout.app')

@section('content')
    @include('admin.partials.common.page-title', ['page_title' => $common_name])
    <div>
        <div class="row-fluid">
            <div class="span12">
                <div class="grid simple ">
                    <div class="grid-title">
                        <a href="{{route($common_route.'.create')}}"  class="btn btn-info btn-cons">
                            <i class="fa fa-plus-square"></i> Add New
                        </a>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            {{--<p class="lead"><a href="#newModal" class="btn btn-default pull-right" data-toggle="modal"><span class="glyphicon glyphicon-plus-sign"></span> new menu item</a> Menu:</p>--}}
                            <p id="success-indicator" class="alert alert-success" style="display:none; margin-right: 10px;">
                                <span class="glyphicon glyphicon-ok"></span> Menu order has been saved
                            </p>
                            <div class="well">
                                <!-- <p class="lead"><a href="#newModal" class="btn btn-default pull-right" data-toggle="modal"><span class="glyphicon glyphicon-plus-sign"></span> new menu item</a> Menu:</p> -->
                                <div class="dd" id="nestable">
                                    {!! $menus !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="well">
                                <p>Drag items to move them in a different order</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.content -->
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {{ Form::open(array('url'=>'/dashboard/menus/modalDelete','method'=>'DELETE')) }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Provide details of the new menu item</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this menu item?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <input type="hidden" name="delete_id" id="postvalue" value="" />
                    <input type="submit" class="btn btn-danger" value="Delete Item" />
                </div>
                {{ Form::close() }}
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@push('scripts')
<script type="text/javascript">
              $(document).ready(function () {
                  $('.dd').nestable({
                      maxDepth: 3,
                      dropCallback: function (details) {

                          var order = new Array();
                          $("li[data-id='" + details.destId + "']").find('ol:first').children().each(function (index, elem) {
                              order[index] = $(elem).attr('data-id');
                          });

                          if (order.length === 0) {
                              var rootOrder = new Array();
                              $("#nestable > ol > li").each(function (index, elem) {
                                  rootOrder[index] = $(elem).attr('data-id');
                              });
                          }
                          $.ajaxSetup({
                              headers: {
                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              }
                          });
                          $.post('{{url("dashboard/menus/order")}}',
                                    {source: details.sourceId,
                                        destination: details.destId,
                                        order: JSON.stringify(order),
                                        rootOrder: JSON.stringify(rootOrder)
                                    },
                                    function (data) {
                                        // console.log('data '+data);
                                    })
                                    .done(function () {
                                        $("#success-indicator").fadeIn(100).delay(1000).fadeOut();
                                    })
                                    .fail(function () { })
                                    .always(function () { });
                      }
                  });

                  $('.delete_toggle').each(function (index, elem) {
                      $(elem).click(function (e) {
                          e.preventDefault();
                          $('#postvalue').attr('value', $(elem).attr('rel'));
                          $('#deleteModal').modal('toggle');
                      });
                  });
              });
</script>


@endpush