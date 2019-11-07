<link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('bootstrap.min'); ?>" />
  <div class="container-fluid">
  <div class="row">
  <div class="col-md-1"></div>
  
   <div class="col-md-8">
   <div class="panel panel-danger" >
    <div class="panel-heading "><span class="glyphicon glyphicon-th"> MENU PRINCIPAL</div>
  <div class="panel-body">
  <div class="col-md-4" >
  <div class="panel panel-primary">
    <div class="panel-heading "><span class="glyphicon glyphicon-certificate"> Nos partenaires</div>
  <div class="panel-body">
<h3><a href=""><p class=" "><span class="glyphicon glyphicon-user"> Partenaires<span class="badge">5</span></p></a></h3>
  </div>
  </div>
  </div>
  <div class="col-md-4" >
  <div class="panel panel-primary">
    <div class="panel-heading "><span class="glyphicon glyphicon-tasks"> Agences de voyages</div>
  <div class="panel-body">
<h3><a href="<?php echo site_url('Admin/liste'); ?>"><p ><span class="glyphicon glyphicon-bishop"> Agences<span class="badge">5</span></p></a></h3>
  </div>
  </div>
  </div>
  <div class="col-md-4" >
  <div class="panel panel-primary">
    <div class="panel-heading "><span class="glyphicon glyphicon-euro"> Payements</div>
  <div class="panel-body">
<h3><a href=""><p ><span class="glyphicon glyphicon-euro"> Paies <span class="badge">5</span></p></a></h3>
  </div>
  </div>
  </div>
  <div class="col-md-4" >
  <div class="panel panel-primary">
    <div class="panel-heading "><span class="glyphicon glyphicon-home"> Hebergements</div>
  <div class="panel-body">
<h3><a href=""><p ><span class="glyphicon glyphicon-home"> Chambres<span class="badge">5</span></p></a></h3>
  </div>
  </div>
  </div>
  
  <div class="col-md-4" >
  <div class="panel panel-primary">
    <div class="panel-heading "><span class="glyphicon glyphicon-envelope"> Gestion SMS</div>
  <div class="panel-body">
<h3><a href=""><p ><span class="glyphicon glyphicon-envelope">  Sms<span class="badge">5</span></p></a></h3>
  </div>
  </div>
  </div>
  
   <div class="col-md-4" >
  <div class="panel panel-primary">
    <div class="panel-heading "><span class="glyphicon glyphicon-bed"> Voyages</div>
  <div class="panel-body">
<h3><a href=""><p ><span class="glyphicon glyphicon-bed">  Transports<span class="badge">5</span></p></a></h3>
  </div>
  </div>
  </div>
  
  
   <div class="col-md-4" >
  <div class="panel panel-primary">
    <div class="panel-heading "><span class="glyphicon glyphicon-globe"> Lien externe</div>
  <div class="panel-body">
<h4><a href=""><p ><span class="glyphicon glyphicon-globe">  Autres liens<span class="badge">5</span></p></a></h4>
  </div>
  </div>
  </div>
  </div>
  </div>
   
   </div>
  <div class="col-md-3">
  <div class="panel panel-info">
    <div class="panel-heading "><h4><span class="glyphicon glyphicon-certificate"> Calendrier</h4></div>
  <div class="panel-body">
<div class="row">
        <div class="col-md-8">
    		<table class="table-condensed table-bordered table-striped">
                <thead>
                    <tr>
                      <th colspan="7">
                        <span class="btn-group">
                            <a class="btn"><i class="icon-chevron-left"></i></a>
                        	<a class="btn active">Mai 2019</a>
                        	<a class="btn"><i class="icon-chevron-right"></i></a>
                        </span>
                      </th>
                    </tr>
                    <tr>
                        <td>Dim</td>
                        <td>Lun</td>
                        <td>Mar</td>
                        <td>Mer</td>
                        <td>Jeu</td>
                        <td>Ven</td>
                        <td>Sam</td>
                    </tr>
                </thead>
                <tbody>
				<tr>
                        <td class="muted">29</td>
                        <td class="muted">30</td>
                        <td class="muted">31</td>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                        <td >11</td>
                    </tr>
					 <tr>
                        <td class="btn-primary">12</td>
                        <td>13</td>
                        <td>14</td>
                        <td>15</td>
                        <td>16</td>
                        <td>17</td>
                        <td>18</td>
                    </tr>
                    <tr>
                        <td>19</td>
                        <td ><strong>20</strong></td>
                        <td>21</td>
                        <td>22</td>
                        <td>23</td>
                        <td>24</td>
                        <td>25</td>
                    </tr>
                    <tr>
                        <td>26</td>
                        <td>27</td>
                        <td>28</td>
                        <td>29</td>
                        <td class="muted">1</td>
                        <td class="muted">2</td>
                        <td class="muted">3</td>
                    </tr>
                </tbody>
            </table>
        </div>
	</div>
	
  </div>
  </div>
  </div>
  </div>
   <script src="<?php echo js_url('jquery'); ?>"></script>
   <script src="<?php echo js_url('bootstrap.min'); ?>"></script>
   <script>
         $('.myPopover').popover({
         html : true,
         content: function() {
          var elementId = $(this).attr("data-popover-content");
          return $(elementId).html();
         }
         });
      </script>
</body>
</html>