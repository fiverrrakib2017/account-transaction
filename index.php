

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accouning Transaction system</title>

    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
      rel="stylesheet"
    />
    <!-- MDB -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
</head>
<body>
<div class="container">
    <div class="row mt-3">
        <div class="col-md-9 m-auto">
            <div class="card">
                <div class="card-header">
                   <div class="row ">
                       <div class="col-sm">
                            Account List
                       </div>
                       <div class="col-sm">
                           <button class="btn-sm  btn-success" type="button" id="addCustomerBtn">Add Customer</button>
                           <button class="btn-sm  btn-info" type="button" id="trasferBtn">Transfer</button>
                       </div>
                   </div>
                </div>
                <div class="card-body">
                    <div id="myTable" class="table table-responsive" >
                        <table class="table table-bordered table-hover " >
                            <thead class="bg-primary text-white">
                              <th>No</th>
                              <th>Customer Name</th>
                              <th>Account No.</th>
                              <th>Account Type</th>
                              <th>Current Balance</th>
                              
                            </thead>
                            <tbody class="customer_data">
                            
                            </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!---add Modal---->
<div id="addModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel"><i class="fa-solid fa-user-plus"></i> Add Customer</h5>
                <button type="button" class="btn-close" aria-label="Close" id="addCloseModal"></button>
            </div>
            <div class="modal-body ">
                <div id="addLoaderDiv" class="container ">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="text-center  ">
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form id="addMainModal" class="d-none">
                    <div class="row d-flex">
                        <div class="form-group mb-2">
                            <label for="">Customer Name</label>
                            <input id="customer_name" type="text" class="form-control" placeholder="Enter Your Customer Name">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Account Number</label>
                            <input id="account_number" type="text" class="form-control" placeholder="Enter Account Number">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Account Type</label>
                            <select id="account_type" type="text" class="form-select">
                                <option value="">Select</option>
                                <option value="Saving">Saving</option>
                                <option value="Current">Current</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Current Balance</label>
                            <input id="current_balance" type="text" class="form-control" placeholder="Enter Current Balance">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="addCustomerConfirmBtn" type="button" class="btn-sm btn btn-success"><i
                        class="mdi mdi-account-plus"></i>&nbsp;Add Now</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
 </div>
<!---End Modal---->


<!---transfer amount Modal---->
<div id="transferModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel"><i class="fa-solid fa-hand-holding-dollar"></i> Money Transfer</h5>
                <button type="button" class="btn-close" aria-label="Close" id="transferCloseModal"></button>
            </div>
            <div class="modal-body ">
                <div id="transferLoaderDiv" class="container ">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="text-center  ">
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form id="transferMainModal" class="d-none">
                    <div class="row d-flex">
                       
                        <div class="form-group mb-2">
                            <label for="">From</label>
                            <select id="from" type="text" class="form-select">
                                <option value="">Select</option>
                                <option value="Saving">Saving</option>
                                <option value="Current">Current</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="">To</label>
                            <select id="to" type="text" class="form-select">
                                <option value="">Select</option>
                                <option value="Saving">Saving</option>
                                <option value="Current">Current</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Amount</label>
                            <input id="amount" type="text" class="form-control" placeholder="Enter Amount">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="addTransferConfirmBtn" type="button" class="btn-sm btn btn-success"><i
                        class="mdi mdi-account-plus"></i>&nbsp;Add Now</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
 </div>
<!---End Modal---->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script  src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
 
<script type="text/javascript">
    $(document).ready(function(){
         
        GetCustomerData();
       function GetCustomerData(){
        var getCstmrData="0";
           $.ajax({
                type:'GET',
                url:'action.php',
                data:{getCstmrData:getCstmrData},
                success:function(response){
                   
                    $(".customer_data").html(response);

                }
           });
       }
       $("#addCustomerBtn").click(function(){
            $("#addModal").modal('show');
            setTimeout(()=>{
                $('#addLoaderDiv').addClass('d-none');
                $('#addMainModal').removeClass('d-none');
            },1000);
       });
        $("#addCloseModal").click(function(){
            $('#addModal').modal('hide');
        });
        $("#addCustomerConfirmBtn").click(function(){
            var customer_name=$('#customer_name').val();
            var account_number=$('#account_number').val();
            var account_type=$('#account_type').val();
            var current_balance=$('#current_balance').val();
            addCustomerData(customer_name,account_number,account_type,current_balance);
        });
        function addCustomerData(customer_name,account_number,account_type,current_balance){
            if (customer_name.length==0) {
                toastr.warning('customer name is require');
            }else if(account_number.length==0){
                toastr.warning('customer Account is require');
            }else if(account_type.length==0){
                toastr.warning(' Account type is require');
            }else if(current_balance.length==0){
                toastr.warning('Current Balance is require');
            }else{
               $.ajax({
                    type:'POST',
                    url:'action.php',
                    data:{customer_name:customer_name,account_number:account_number,account_type:account_type,current_balance:current_balance},
                    success:function(response){
                        //$(".customer_data").html(response);
                        //toastr.error(response);
                        if (response==1) {

                            toastr.success('Customer Added Successfully');
                            $('#addModal').modal('hide');
                            GetCustomerData();
                            var customer_name=$('#customer_name').val('');
                            var account_number=$('#account_number').val('');
                            var account_type=$('#account_type').val('');
                            var current_balance=$('#current_balance').val('');
                        }else{
                            toastr.error('Something else please try again!');
                        }
                    }
               }); 
            }
        }

        //transfer amount script
        $("#trasferBtn").click(function(){
            $("#transferModal").modal('show');
            setTimeout(()=>{
                $('#transferLoaderDiv').addClass('d-none');
                $('#transferMainModal').removeClass('d-none');
            },1000);
            $("#transferCloseModal").click(function(){
                 $('#transferModal').modal('hide');
            });
        });
        GetCustomerName();
        function GetCustomerName(){
        var getCstmrName="0";
           $.ajax({
                type:'GET',
                url:'action.php',
                data:{getCstmrName:getCstmrName},
                success:function(response){
                    $("#from").html(response);
                    $("#to").html(response);
                }
           });
       }
       $("#addTransferConfirmBtn").click(function(){
             var from=$('#from').val();
            var to=$('#to').val();
            var amount=$('#amount').val();
             addTransferData(from,to,amount);
       });
       function addTransferData(from,to,amount){
           if (from.length==0) {
                toastr.warning('Customer From name is require');
            }else if(to.length==0){
                toastr.warning('Customer To name is require');
            }else if(amount.length==0){
                toastr.warning('Customer Amount is require');
            }else{
                var addTransferData="0"
               $.ajax({
                    type:'POST',
                    url:'action.php',
                    data:{from:from,to:to,amount:amount,addTransferData:addTransferData},
                    success:function(response){
                        if (response==1) {
                            $('#transferModal').modal('hide');
                            toastr.success('Transaction Process Successfully');
                            var amount=$('#amount').val('');
                            GetCustomerData();
                        }else{
                            toastr.error('Something else please try again!');
                        }
                    }
               }); 
            }  
       }
    });
</script>
</body>
</html>