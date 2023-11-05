<!DOCTYPE html>
<html>
<head>
    <title>Hi</title>
</head>
<body>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <img src="{{ asset('assets/images/HIC.png') }}" class="img-thumbnail" alt="">
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>Order Status & Info</th>
                            <th>Buyer Information</th>
                        </tr>
                        <tbody>
                            <tr>
                                <td>
                                    {{ $order_id }}
                                    {{ $date }}
                                    {{ $delivery }}
                                    {{ $gatepass }}
                                    {{ $gatepassstatus }}
                                    {{ $due_date }}
                                </td>
                                <td>
                                    {{ $buyer_id }}

                                </td>
                            </tr>
                        </tbody>
                    </thead>
                  </table>
               </div>
            </div>
        </div>
    </div>
</body>
</html>
