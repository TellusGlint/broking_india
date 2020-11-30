<!DOCTYPE html>
<html lang="en">
<head>
<?php include("meta.php"); ?> 
<link rel="stylesheet" href="assets/css/bundle.min.css" />
</head>
<body>
<?php include("header-inner.php"); ?> 
  <!-- Breadcrumb Area Start -->
  <nav class="breadcrumb-area bg-dark bg-6 pt-60 pb-30">
    <div class="container d-md-flex">
      <h2 class="text-white mb-0">Brokerage Calculator</h2>
      <ol class="breadcrumb p-0 m-0 bg-dark ml-auto">
        <li class="breadcrumb-item"><a href="index.html">Home</a> <span class="text-white">/</span></li>
        <li aria-current="page" class="breadcrumb-item active">Brokerage Calculator</li>
      </ol>
    </div>
  </nav>
  <!-- Breadcrumb Area End -->

  <div class="bg-3 bg-white ">
		<section class="brokerage-calc-sections  ptb-100">
        <div class="container">
            <div id="mytabs" class="tabs-container">
                <div class="section" id="equities">
                    <h3 class="title">Equities - F&amp;O</h3>
                    <div class="row between">
                        <div class="brokerage-columns column equity-calcs calc-wrapper" id="intraday-equity-calc">
                            <h5 class="equity-head">Intraday equity</h5>
                            <div class="row calc-inputs around">
                                <div class="four columns brokerage-calculator-input">
                                    <label>BUY</label>
                                    <input type="number" min="0" title="Buy Price" value="1000" oninput="cal_intra()"
                                        class="intra intra_bp">
                                </div>
                                <div class="four columns brokerage-calculator-input">
                                    <label>SELL</label>
                                    <input type="number" min="0" title="Sell Price" value="1100" oninput="cal_intra()"
                                        class="intra intra_sp">
                                </div>
                                <div class="four columns brokerage-calculator-input">
                                    <label>QUANTITY</label>
                                    <input type="number" min="0" title="Quantity" value="400" oninput="cal_intra()"
                                        class="intra intra_qty">
                                </div>
                            </div>
                            <div class="row">
                                <div class="six columns equity-radio text-center">
                                    <input id="radio11" type="radio" name="listing-market1" value="NSE"
                                        onchange="cal_intra()" class="intra_nse intra" checked>
                                    <label for="radio11">NSE</label>
                                </div>
                                <div class="six columns equity-radio text-center">
                                    <input id="radio12" type="radio" name="listing-market1" value="BSE"
                                        onchange="cal_intra()" class="intra_bse_option">
                                    <label for="radio12">BSE</label>
                                </div>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Turnover</label>
                                <span class="five columns val" id="intra_turn">0</span>
                            </div>
                            <div class="row equity-list valuation-block equity-list">
                                <label class="seven columns">Brokerage</label>
                                <span class="five columns val" id="intra_brokerage">0</span>
                            </div>
                            <div class="row equity-list valuation-block equity-list">
                                <label class="seven columns">STT total</label>
                                <span class="five columns val" id="intra_stt">0</span>
                            </div>
                            <div class="row equity-list valuation-block equity-list">
                                <label class="seven columns">Exchange txn charge</label>
                                <span class="five columns val" id="intra_etc">0</span>
                            </div>
                            <div class="row equity-list valuation-block equity-list">
                                <label class="seven columns">Clearing charge</label>
                                <span class="five columns val" id="intra_cc">0</span>
                            </div>
                            <div class="row equity-list valuation-block equity-list">
                                <label class="seven columns">GST</label>
                                <span class="five columns val" id="intra_st">0</span>
                            </div>
                            <div class="row equity-list valuation-block equity-list">
                                <label class="seven columns">SEBI charges</label>
                                <span class="five columns val" id="sebi">0</span>
                            </div>
                            <div class="row equity-list valuation-block equity-list">
                                <label class="seven columns">Stamp duty</label>
                                <span class="five columns val" id="stamp_duty">0</span>
                            </div>
                            <div class="row equity-list valuation-block equity-list">
                                <label class="seven columns">Total tax and charges</label>
                                <span class="five columns val" id="intra_total">0</span>
                            </div>
                            <div class="row equity-list valuation-block equity-list">
                                <label class="seven columns">Points to breakeven</label>
                                <span class="five columns val" id="intra_breakeven">0</span>
                            </div>
                            <div class="row net-profit" id="intra_profit">
                                <label class="six columns">Net P&amp;L</label>
                                <span class="six columns profit" id="intra_pnl">0</span>
                            </div>
                           
                        </div>
                        <div class="brokerage-columns column equity-calcs calc-wrapper" id="delivery-equity-calc">
                            <h5 class="equity-head">Delivery equity</h5>
                            <div class="row calc-inputs around">
                                <div class="four columns brokerage-calculator-input">
                                    <label>BUY</label>
                                    <input type="number" min="0" title="Buy Price" oninput="cal_delivery()"
                                        value="1000" class="delivery del_bp">
                                </div>
                                <div class="four columns brokerage-calculator-input">
                                    <label>SELL</label>
                                    <input type="number" min="0" title="Sell Price" oninput="cal_delivery()"
                                        value="1100" class="delivery del_sp">
                                </div>
                                <div class="four columns brokerage-calculator-input">
                                    <label>QUANTITY</label>
                                    <input type="number" min="0" title="Quantity" oninput="cal_delivery()" value="400"
                                        class="delivery del_qty">
                                </div>
                            </div>
                            <div class="row">
                                <div class="six columns equity-radio text-center">
                                    <input id="radio21" type="radio" name="listing-market2" onchange="cal_delivery()"
                                        value="NSE" class="del_nse delivery" checked>
                                    <label for="radio21">NSE</label>
                                </div>
                                <div class="six columns equity-radio text-center">
                                    <input id="radio22" type="radio" name="listing-market2" onchange="cal_delivery()"
                                        value="BSE" class="del_bse_option">
                                    <label for="radio22">BSE</label>
                                </div>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Turnover</label>
                                <span class="five columns" id="del_turn">0</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Brokerage</label>
                                <span class="five columns" id="del_brokerage">0</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">STT total</label>
                                <span class="five columns" id="del_stt">0</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Exchange txn charge</label>
                                <span class="five columns" id="del_etc">0</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Clearing charge</label>
                                <span class="five columns" id="del_cc">0</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">GST</label>
                                <span class="five columns" id="del_st">0</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">SEBI charges</label>
                                <span class="five columns" id="sebi_delivery">0</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Stamp duty</label>
                                <span class="five columns" id="stamp_duty_delivery">0</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Total tax and charges</label>
                                <span class="five columns" id="del_total">0</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Points to breakeven</label>
                                <span class="five columns" id="del_breakeven">0</span>
                            </div>
                            <div class="row net-profit" id="del_profit">
                                <label class="six columns">Net P&amp;L</label>
                                <span class="six columns profit" id="del_pnl">0</span>
                            </div>
                           
                        </div>
                        <div class="brokerage-columns column equity-calcs calc-wrapper" id="futures-equity-calc">
                            <h5 class="equity-head">F&amp;O - Futures</h5>
                            <div class="row calc-inputs around">
                                <div class="four columns brokerage-calculator-input">
                                    <label>BUY</label>
                                    <input type="number" min="0" title="Buy Price" value="1000" oninput="cal_futures()"
                                        class="fut_bp futures">
                                </div>
                                <div class="four columns brokerage-calculator-input">
                                    <label>SELL</label>
                                    <input type="number" min="0" title="Sell Price" value="1100"
                                        oninput="cal_futures()" class="fut_sp futures">
                                </div>
                                <div class="four columns brokerage-calculator-input">
                                    <label>QUANTITY</label>
                                    <input type="number" min="0" title="Quantity" value="400" oninput="cal_futures()"
                                        class="fut_qty futures">
                                </div>
                            </div>
                            <div class="row">
                                <div class="six columns equity-radio text-center">
                                    <input id="radio31" type="radio" name="listing-market3" value="NSE"
                                        onchange="cal_futures()" class="fut_nse futures" checked>
                                    <label for="radio31">NSE</label>
                                </div>
                                <div class="six columns equity-radio text-center">
                                    <input id="radio32" type="radio" name="listing-market3" value="BSE"
                                        onchange="cal_futures()" class="fut_bse_option">
                                    <label for="radio32">BSE</label>
                                </div>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Turnover</label>
                                <span class="five columns val" id="fut_turn">0</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Brokerage</label>
                                <span class="five columns val" id="fut_brokerage">0</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">STT total</label>
                                <span class="five columns val" id="fut_stt">0</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Exchange txn charge</label>
                                <span class="five columns val" id="fut_etc">0</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Clearing charge</label>
                                <span class="five columns val" id="fut_cc">0</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">GST</label>
                                <span class="five columns val" id="fut_st">0</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">SEBI charges</label>
                                <span class="five columns val" id="sebi_fut">0</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Stamp duty</label>
                                <span class="five columns val" id="stamp_duty_fut">0</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Total tax and charges</label>
                                <span class="five columns val" id="fut_total">0</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Points to breakeven</label>
                                <span class="five columns val" id="fut_breakeven">0</span>
                            </div>
                            <div class="row net-profit" id="fut_profit">
                                <label class="six columns">Net P&amp;L</label>
                                <span class="six columns profit" id="fut_pnl">0</span>
                            </div>
                           
                        </div>
                        <div class="brokerage-columns column equity-calcs calc-wrapper" id="options-equity-calc">
                            <h5 class="equity-head">F&amp;O - Options</h5>
                            <div class="row calc-inputs around">
                                <div class="four columns brokerage-calculator-input">
                                    <label>BUY</label>
                                    <input type="number" min="0" title="Buy Price" oninput="cal_options()" value="100"
                                        class="opt_bp options">
                                </div>
                                <div class="four columns brokerage-calculator-input">
                                    <label>SELL</label>
                                    <input type="number" min="0" title="Sell Price" oninput="cal_options()" value="110"
                                        class="opt_sp options">
                                </div>
                                <div class="four columns brokerage-calculator-input">
                                    <label>QUANTITY</label>
                                    <input type="number" min="0" title="Quantity" oninput="cal_options()" value="400"
                                        class="opt_qty options">
                                </div>
                            </div>
                            <div class="row">
                                <div class="six columns equity-radio text-center">
                                    <input id="radio41" type="radio" name="listing-market4" onchange="cal_options()"
                                        value="NSE" class="opt_nse" checked>
                                    <label for="radio41">NSE</label>
                                </div>
                                <div class="six columns equity-radio text-center">
                                    <input id="radio42" type="radio" name="listing-market4" onchange="cal_options()"
                                        value="BSE" class="opt_bse_option">
                                    <label for="radio42">BSE</label>
                                </div>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Turnover</label>
                                <span class="five columns" id="opt_turn">0</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Brokerage</label>
                                <span class="five columns" id="opt_brokerage">0</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">STT total</label>
                                <span class="five columns" id="opt_stt">0</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Exchange txn charge</label>
                                <span class="five columns" id="opt_etc">0</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Clearing charge</label>
                                <span class="five columns" id="opt_cc">0</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">GST</label>
                                <span class="five columns" id="opt_st">0</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">SEBI charges</label>
                                <span class="five columns" id="sebi_opt">0</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Stamp duty</label>
                                <span class="five columns" id="stamp_duty_opt">0</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Total tax and charges</label>
                                <span class="five columns" id="opt_total">0</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Points to breakeven</label>
                                <span class="five columns" id="opt_breakeven">0</span>
                            </div>
                            <div class="row net-profit" id="opt_profit">
                                <label class="six columns">Net P&amp;L</label>
                                <span class="six columns profit" id="opt_pnl">0</span>
                            </div>
                          
                        </div>
                    </div>
                </div>                
                <div class="section" id="commodities">
                    <h3 class="title">Commodities</h3>
                    <div class="row between">
                        <div class="six columns calc-wrapper" id="commodity-mcx-calc-fut">
                            <h5 class="equity-head">Futures</h5>
                            <div class="row commodity calc-inputs around">
                                <div class="three columns brokerage-calculator-input commodity-select">
                                    <label>COMMODITY</label>
                                    <select class="comm-fut comm-fut-select"
                                        id="commodity_multiplier_fut">
                                    </select>
                                </div>
                                <div class="three columns brokerage-calculator-input">
                                    <label>BUY</label>
                                    <input type="number" min="0" title="Buy" oninput="cal_comm_fut()"
                                        class="comm-fut comm_fut_bp" value="110">
                                </div>
                                <div class="three columns brokerage-calculator-input">
                                    <label>SELL</label>
                                    <input type="number" min="0" title="Sell" oninput="cal_comm_fut()"
                                        class="comm-fut comm_fut_sp" value="112">
                                </div>
                                <div class="three columns brokerage-calculator-input">
                                    <label>QUANTITY</label>
                                    <input type="number" min="0" title="Quantity" oninput="cal_comm_fut()"
                                        class="comm-fut comm_fut_qty" value="1">
                                </div>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Turnover</label>
                                <span class="five columns" id="comm_fut_turn">222000</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Brokerage</label>
                                <span class="five columns" id="comm_fut_brokerage">22.20</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Exchange charge</label>
                                <span class="five columns" id="comm_fut_etc">5.77</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Clearing charge</label>
                                <span class="five columns" id="comm_fut_cc">0</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">GST</label>
                                <span class="five columns" id="comm_fut_st">5.03</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">CTT</label>
                                <span class="five columns" id="comm_fut_ctt">11.2</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">SEBI charges</label>
                                <span class="five columns" id="sebi_comm_fut">0.22</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Stamp duty</label>
                                <span class="five columns" id="stamp_duty_comm_fut">0.22</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Total tax and charges</label>
                                <span class="five columns" id="comm_fut_total">44.42</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Points to breakeven</label>
                                <span class="five columns" id="comm_fut_breakeven">0.04</span>
                            </div>
                            <div class="row net-profit" id="comm_fut_profit">
                                <label class="six columns">Net P&amp;L</label>
                                <span class="six columns profit" id="comm_fut_pnl">1955.58</span>
                            </div>
                           
                        </div>
                        <div class="six columns calc-wrapper" id="commodity-mcx-calc-opt">
                            <h5 class="equity-head">Options</h5>
                            <div class="row commodity calc-inputs around">
                                <div class="three columns brokerage-calculator-input commodity-select">
                                    <label>COMMODITY</label>
                                    <select class="comm-opt comm-opt-select"
                                        id="commodity_multiplier_opt">
                                    </select>
                                </div>
                                <div class="three columns brokerage-calculator-input">
                                    <label>STRIKE PRICE</label>
                                    <input type="number" min="0" title="Strike Price" oninput="cal_comm_opt()"
                                        id="comm_opt_srp_input" class="comm-opt comm_opt_srp" value="400">
                                </div>
                                <div class="two columns brokerage-calculator-input">
                                    <label>BUY</label>
                                    <input type="number" min="0" title="Buy Premium" oninput="cal_comm_opt()"
                                        class="comm-opt comm_opt_bp" value="1">
                                </div>
                                <div class="two columns brokerage-calculator-input">
                                    <label>SELL</label>
                                    <input type="number" min="0" title="Sell Premium" oninput="cal_comm_opt()"
                                        class="comm-opt comm_opt_sp" value="2">
                                </div>
                                <div class="two columns brokerage-calculator-input">
                                    <label>QUANTITY</label>
                                    <input type="number" min="0" title="Quantity" oninput="cal_comm_opt()"
                                        class="comm-opt comm_opt_qty" value="1">
                                </div>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">
                                    Turnover
                                    <span class="comm_opt_notional">?</span>
                                </label>
                                <span class="five columns" id="comm_opt_turn">3000</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Brokerage</label>
                                <span class="five columns" id="comm_opt_brokerage">40</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Exchange charge</label>
                                <span class="five columns" id="comm_opt_etc">0</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Clearing charge</label>
                                <span class="five columns" id="comm_opt_cc">0</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">GST</label>
                                <span class="five columns" id="comm_opt_st">7.2</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">CTT</label>
                                <span class="five columns" id="comm_opt_ctt">1</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">SEBI charges</label>
                                <span class="five columns" id="sebi_comm_opt">0</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Stamp duty</label>
                                <span class="five columns" id="stamp_duty_comm_opt">0</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Total tax and charges</label>
                                <span class="five columns" id="comm_opt_total">48.20</span>
                            </div>
                            <div class="row valuation-block equity-list">
                                <label class="seven columns">Points to breakeven</label>
                                <span class="five columns" id="comm_opt_breakeven">0.05</span>
                            </div>
                            <div class="row net-profit" id="comm_opt_profit">
                                <label class="six columns">Net P&amp;L</label>
                                <span class="six columns profit" id="comm_opt_pnl">951.8</span>
                            </div>
                           
                        </div>
                    </div>
                    <div class="comm-calc-info row">
                        <div class="three columns">&nbsp;</div>
                        <div class="six columns">
                            <div class="commodity-card">
                                <div class="card-head">
                                    <h6 id="commodity-text">Profit/Loss made for every &#8377; 1 change in<br>ALUMINIUM
                                    </h6>
                                </div>
                                <div class="text-center change-value">
                                    <p id="commodity-value">&#8377; 5000</p>
                                </div>
                                <div class="row">
                                    <div class="six columns units">
                                        <p>Base value<span id="comm_base">Per kg</span></p>
                                    </div>
                                    <div class="six columns units">
                                        <p>Trading unit<span id="comm_unit">5 MT</span></p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="six columns">
                                            <p>MMBTU = Million Metric Terminal Units.</p>
                                        </div>
                                        <div class="six columns">
                                            <p>MT (Metric Ton) = 1000 Kilos/10 Quintals</p>
                                        </div>
                                    </div>
                                    <p>Quintal = 100 Kilos</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>               
            </div>
        </div>
    </section>
  </div>
<?php include("footer.php"); ?> 
<script src="assets/js/bundle.min.js"></script>
<script type="text/javascript" src="assets/js/brokerage.min.js"></script>
</body>
</html>
