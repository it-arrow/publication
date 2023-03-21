<div class="modal-header">
    <h5 class="modal-title" id="editPaymentLabel">Payment Info</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form action="{{route('manpower_payment.update',$manpower->id)}}" method="post">
    @csrf
    @method('PATCH')
<div class="modal-body p-4">
    <div class="mb-3">
        <label for="total">Total Amount:</label><span class="text-danger"> *</span>
        <input class="form-control" type="number" name="total_amount" id="total" value="{{$manpower->total_amount}}" required>
    </div>
    <div class="mb-3">
        <label for="paid_amount">Paid Amount</label>
        <input class="form-control" type="number" name="paid_amount" id="paid_amount" value="{{$manpower->paid_amount}}">
        
    </div>
    
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save</button>
</div>
</form>
