<div class="modal fade" id="deposit-money">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Deposit</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="{{ route('customerRelationOfficer.deposit_money') }}" method="post" class="needs-validation" novalidate>
            @csrf
            <div class="modal-body">
                <div class="card">
                    <div class="card-body register-card-body">
                            <div class="form-group">
                                <label for="account_number">Account number</label>
                                <input id="account_number" type="text"
                                    class="form-control @error('account_number') is-invalid @enderror"
                                    name="account_number" value="{{ old('account_number') }}" required
                                    autocomplete="account_number" style="width: 70%;" placeholder="Enter account number">
                                    <div class="invalid-feedback">
                                        Valid input is required.
                                    </div>
                                @error('account_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="deposit_amount">Deposit amount</label>
                                <input id="deposit_amount" type="text"
                                    class="form-control @error('deposit_amount') is-invalid @enderror"
                                    name="deposit_amount" value="{{ old('deposit_amount') }}" required
                                    autocomplete="deposit_amount" style="width: 70%;" placeholder="Enter transaction amount">
                                    <div class="invalid-feedback">
                                        Valid input is required.
                                    </div>
                                @error('deposit_amount')
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
            <button type="submit" class="btn btn-success">Deposit</button>
            </div>
    </form>
      </div>
    </div>
  </div>
