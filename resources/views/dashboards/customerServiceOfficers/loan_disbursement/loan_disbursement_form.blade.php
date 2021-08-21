<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Loan Disbursement</h4>
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
                                <label for="roll_number">Roll Number</label>
                                <input id="roll_number" type="text"
                                    class="form-control @error('roll_number') is-invalid @enderror"
                                    name="roll_number" value="{{ old('roll_number') }}" required
                                    autocomplete="roll_number" style="width: 70%;" placeholder="Enter roll number">
                                @error('roll_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="disburse_amount">Disburse amount</label>
                                <input id="disburse_amount" type="text"
                                    class="form-control @error('disburse_amount') is-invalid @enderror"
                                    name="disburse_amount" value="{{ old('disburse_amount') }}" required
                                    autocomplete="disburse_amount" style="width: 70%;" placeholder="Enter disbursed amount">
                                @error('disburse_amount')
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
            <button type="submit" class="btn btn-success">Disburse loan</button>
            </div>
    </form>
      </div>
    </div>
  </div>
