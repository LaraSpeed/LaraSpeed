<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">@{{ title }}</h4>
            </div>
            <div class="modal-body">
                <div class="row" style="padding-left: 50px; padding-right: 50px;">
                     <h3>@{{ description }}</h3>
                     <button type="button" ng-click="delete();" class="btn btn-lg btn-primary pull-left">YES</button>
                     <button type="button" class="btn btn-lg btn-danger pull-right" data-dismiss="modal">NO</button>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>

    </div>
</div>
