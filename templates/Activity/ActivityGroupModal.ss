<% require css('twitter/bootstrap/dist/css/bootstrap.min.css') %>
<% require css('components/font-awesome/css/font-awesome.min.css') %>
<% require css('booteek/css/style.min.css') %>
<% require css('aqua/css/style.min.css') %>

<% require javascript('twitter/bootstrap/dist/js/bootstrap.bundle.min.js') %>
<% require javascript('components/jquery/jquery.min.js') %>
<% require javascript('components/jqueryui/jquery-ui.min.js') %>
<% require javascript('aqua/app/dist/bundle.js') %>

<div class="block text-block activity-block">
    <div class="pane round content typography">
        <h2>$Title</h2>
        $Content
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#aqua-$ID"><%t Aqua.START_ACTIVITY "Start Activity" %></button>
    </div>
</div>

<!-- The Modal -->
<div id="aqua-$ID" class="aq-activity-main aq-modal modal fade" role="dialog" data-options=$dataOptions data-translations=$translations>
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                 <span class="title">
                     $Title
                 </span>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="aq-main-pane ">
                    <div class="pane content aq-upper-section">
                        <div class="section left aq-intro">
                        </div>
                        <div class="section right aq-score">
                        </div>
                    </div>
                    <ul class="aq-activities">
                        <% loop $Activities %>
                            <li>
                                $Me
                            </li>
                        <% end_loop %>
                    </ul>
                    <div class="pane content aq-lower-section">
                        <div class="section right aq-buttons">
                            <button id="aq-confirm-$ID" class="inactive aq-confirm"><%t Aqua.CONFIRM "Confirm" %></button>
                            <button class="inactive aq-next" id="aq-next-$ID"><%t Aqua.NEXT "Next" %></button>
                        </div>
                    </div>
                </div>
                <div class="pane content aq-final-pane">
                    <h3><%t Aqua.ACTIVITY_COMPLETED "Activity Completed" %></h3>
                    <span class="aq-final-score"></span>
                    <button class="aq-try-again"><%t Aqua.TRY_AGAIN "Try Again" %></button>
                </div>
            </div>

            <div class="modal-footer pane round bottom">
                <button id="modal-cancel" type="button" class="btn btn-secondary" data-dismiss="modal"><%t Aqua.CLOSE "Close" %></button>
            </div>
        </div>

        <!-- Modal footer -->
    </div>
</div>
<!-- END MODAL -->