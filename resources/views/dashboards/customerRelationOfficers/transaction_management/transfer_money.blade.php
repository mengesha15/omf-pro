<div class="modal fade" id="transfer-money">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Transfering</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="{{ route('customerServiceOfficer.new_loan_disbursement') }}" method="post">
            @csrf
            <div class="modal-body">
                <div class="card">
                    <div class="card-body register-card-body">
                            <div class="form-group">
                                <label for="sender_account_number">Sender's account number</label>
                                <input id="sender_account_number" type="text"
                                    class="form-control @error('sender_account_number') is-invalid @enderror"
                                    name="sender_account_number" value="{{ old('sender_account_number') }}" required
                                    autocomplete="sender_account_number" style="width: 70%;" placeholder="Enter sender account number">
                                @error('sender_account_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="receiver_account_number">Receiver's account number</label>
                                <input id="receiver_account_number" type="text"
                                    class="form-control @error('receiver_account_number') is-invalid @enderror"
                                    name="receiver_account_number" value="{{ old('receiver_account_number') }}" required
                                    autocomplete="receiver_account_number" style="width: 70%;" placeholder="Enter receiver account number">
                                @error('receiver_account_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="transfer_amount">Amount</label>
                                <input id="transfer_amount" type="text"
                                    class="form-control @error('transfer_amount') is-invalid @enderror"
                                    name="transfer_amount" value="{{ old('transfer_amount') }}" required
                                    autocomplete="transfer_amount" style="width: 70%;" placeholder="Enter transfer amount">
                                @error('transfer_amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success">Transfer</button>
            </div>
    </form>
      </div>
    </div>
  </div>
