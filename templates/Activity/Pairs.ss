<!--<div class="pane content aq-activity aq-pairs" id="activity-$ID" data-object="PairActivity" data-canvas="#canvas-$ID">

	<div class="aq-pair-activity-area" id="area-1" style="display:block">
		<ul class="aq-pool aq-left-pool">
            <% loop $leftSide.Sort('RAND()') %>
				<li class="aq-canvas-item aq-selectable aq-box" data-text="$Text" data-pair="$PairID" data-side="$Side">$Text</li>
            <% end_loop %>
		</ul>
		<ul class="aq-pool aq-right-pool">
            <% loop $rightSide.Sort('RAND()') %>
				<li class="aq-canvas-item  aq-selectable aq-box" data-text="$Text" data-pair="$PairID" data-side="$Side">$Text</li>
            <% end_loop %>
		</ul>
	</div>
</div>-->
<div class="pane content aq-activity aq-order-list aq-pairs" id="activity-$ID" data-object="PairActivity">
	<div class="pane aq-question">
        $Question
	</div>
	<ul class="drag-and-drop">
		<li>
			<ul class="order">
                <% loop $leftSide %>
					<li class="left-pair" data-text="$Text" data-pair="$PairID" data-side="$Side" ><p>$Text</p></li>
                <% end_loop %>
			</ul>
		</li>
		<li>
			<ul id="selection-area" class="selection area">
                <% loop $rightSide.Sort('RAND()') %>
					<li id="item-$ID" data-sort="$SortOrder" class="aq-selectable aq-box" data-text="$Text" data-pair="$PairID" data-side="$Side">
						<p>$Text</p>
						<div class="aq-icons"></div>
					</li>
                <% end_loop %>
			</ul>
		</li>
	</ul>
</div>