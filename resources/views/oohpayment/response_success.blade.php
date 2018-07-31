@extends('layouts.app')

@section('content')
 <div class="col-md-1">
 </div>
        <div class="col-md-11 mbottom100">
            <div class="panel panel-default">
                <div class="panel-heading">Success Payment Detail</div>
                <div class="panel-body">
                      <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <tr>
              <th>TransactionId</th>
              <td>{!!trim(html_entity_decode($data['endpointTransactionId']),'"')!!}</td>      
            </tr>
              <tr>
              <th>Order Id</th>
              <td>{!!trim(html_entity_decode($data['oid']),'"')!!}</td>      
            </tr>
             <tr>
              <th>Amount</th>
              <td>{!!trim(html_entity_decode($data['amount']),'"')!!}</td>      
            </tr>
              <tr>
              <th>Status</th>
              <td>{!!trim(html_entity_decode($data['status']),'"')!!}</td>      
            </tr>
          
      
          </table>
 
  </div> 
				 
						 
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="{{ url('/dashboard') }}" class="btn btn-primary">
                                    Back to dashboard
                                 </a>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection
