<div class="modal fade" id="print_deposit_receipt">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><u>Deposit receipt</u></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card">
                <div class="card-body register-card-body">
                        <div class="row">
                            <div class="col-md-4">Branch:
                                 {{-- {{' '.$customer->branch_name  }} --}}
                                </div>
                            <div class="col-md-4">Branch:
                                {{-- {{' '.date('d-m-Y')  }} --}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="account_number">Name:
                                {{-- {{' '. $customer->first_name.' '.$customer->middle_name.' '.$customer->last_name }} --}}
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="deposit_amount">Account number:
                                {{-- {{' '.$deposit_amount }} --}}
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="deposit_amount">Deposited amount:
                                {{-- {{' '. $deposit_amount }} --}}
                            </label>
                        </div>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success">Print</button>
        </div>
      </div>
    </div>
  </div>
