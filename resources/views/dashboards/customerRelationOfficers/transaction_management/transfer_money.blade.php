<div class="modal fade" id="transfer-money">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Money transfer</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="{{ route('customerRelationOfficer.transfer_money') }}" method="post" class="needs-validation" novalidate>
            @csrf
            <div class="modal-body">
                <div class="card">
                    <div class="card-body register-card-body">
                            <div class="form-group">
                                <label for="sender_account_number">Sender's account number</label>
                                <input id="sender_account_number" type="text"
                                    class="form-control" name="sender_account_number" value="{{ old('sender_account_number') }}" required
                                    autocomplete="sender_account_number" style="width: 70%;" placeholder="Enter sender account number">
                                    <div class="invalid-feedback">
                                        Valid input is required.
                                    </div>
                                @if ($errors->transfer_errors->has('sender_account_number'))
                                    <span class="text-danger">{{ $errors->transfer_errors->first('sender_account_number') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="receiver_account_number">Receiver's account number</label>
                                <input id="receiver_account_number" type="text"
                                    class="form-control" name="receiver_account_number" value="{{ old('receiver_account_number') }}" required
                                    autocomplete="receiver_account_number" style="width: 70%;" placeholder="Enter receiver account number">
                                    <div class="invalid-feedback">
                                        Valid input is required.
                                    </div>
                                @if ($errors->transfer_errors->has('receiver_account_number'))
                                    <span class="text-danger">{{ $errors->transfer_errors->first('receiver_account_number') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="transfer_amount">Amount</label>
                                <input id="transfer_amount" type="text"
                                    class="form-control"
                                    name="transfer_amount" value="{{ old('transfer_amount') }}" required
                                    autocomplete="transfer_amount" style="width: 70%;" placeholder="Enter transfer amount">
                                    <div class="invalid-feedback">
                                        Valid input is required.
                                    </div>
                                @if ($errors->transfer_errors->has('transfer_amount'))
                                    <span class="text-danger">{{ $errors->transfer_errors->first('transfer_amount') }}</span>
                                @endif
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
