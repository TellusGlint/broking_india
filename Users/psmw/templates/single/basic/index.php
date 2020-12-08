<?php defined('SMW_ROOT_DIR') or die('Direct access is not allowed');?>
<div id="<?php print $widgetId;?>" class="<?php print $widgetClass?>" <?php print $widgetDataAttributes?>>
  <table id="table-search" class="table">
    <thead>
      <tr>
      <?php foreach ($widgetFields as $code):?>
        <th <?php print isset($liveDataFields[$code]->format)?' class="smw-tablesort smw-'.$liveDataFields[$code]->format.'"':''?>><?php print $liveDataFields[$code]->name?></th>
	  <?php endforeach?>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($widgetSymbols as $symbol): ?>
      <tr>
      <?php foreach ($widgetFields as $code):?>
        <?php if ($code=='quote.regularMarketPrice'):?>
        <td class="smw-cell-with-indicator ">
          <span class="smw-change-indicator" data-symbol="<?php print $symbol ?>">
            <i class="fa fa-arrow-down smw-arrow-icon smw-arrow-drop"></i>
            <i class="fa fa-arrow-up smw-arrow-icon smw-arrow-rise"></i>
          </span>
          <span class="smw-market-data-field" data-symbol="<?php print $symbol ?>" data-field="<?php print $code?>"></span>
        </td>
        <?php else:?>
        <td class="smw-market-data-field <?php print in_array($code,['quote.regularMarketChange','quote.regularMarketChangePercent'])?'smw-change-indicator':''?>" data-symbol="<?php print $symbol ?>" data-field="<?php print $code?>">
		</td>
        <?php endif?>		
        <?php endforeach?>	
		 <?php foreach ($widgetFields as $code):?>
        <?php if ($code=='quote.regularMarketPrice'):?>
		<td>		
		<div class="btn-group">
				<a class="dropdown-item sellSelect" href="#register-modal" data-toggle="modal"
                                        data-target="#register-modal">Sell</a>				
			</div>
		</div>		
		</td>
		 <?php endif?>		
        <?php endforeach?>	
      </tr>
    <?php endforeach;?>
    </tbody>	
  </table>
  <?php include("modal.php"); ?>
</div>

<script>
  (function ($) {
    $(document).ready(function() {
      var $widget = $('#<?php print $widgetId?>');
      $widget.one('psmwReadyGlobal', function (event) {
        $widget.tablesort();
        $widget.find('th.smw-tablesort').data('sortBy', premiumStockMarketWidgetsPlugin.tablesortGetValue);
      });
    });
  })(jQuery);
  
  $(document).ready(function(){ 
	 $("#table-search").on('click','.btnSelect',function(){ 	 
        var currentRow=$(this).closest("tr");
         var col1=currentRow.find("td:eq(0)").text();
		 var col2=currentRow.find("td:eq(1)").text();
		 var col3=currentRow.find("td:eq(2)").text();
        $.ajax({
            type : 'post',
            url : 'pass_record.php', //Here you will fetch records 
            data :  {col1:col1,col2:col2,col3:col3}, //Pass $id
            success : function(data){
            $('.fetched-data').html(data);//Show fetched data from database
            }
        });
     });
		$("#table-search").on('click','.sellSelect',function(){ 	 
        var currentRow=$(this).closest("tr");
         var cols1=currentRow.find("td:eq(0)").text();
		 var cols2=currentRow.find("td:eq(1)").text();
		 var cols3=currentRow.find("td:eq(2)").text();
        $.ajax({
            type : 'post',
            url : 'sell_record.php', //Here you will fetch records 
            data :  {cols1:cols1,cols2:cols2,cols3:cols3}, //Pass $id
            success : function(data){
            $('.fetched-datas').html(data);//Show fetched data from database
            }
        });
     });
});
</script>