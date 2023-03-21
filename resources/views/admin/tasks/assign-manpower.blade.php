<div class="modal-header">
    <h5 class="modal-title" id="assignManpowerLabel">Assign Manpower</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form action="{{route('assign.manpower',$task->id)}}" method="post">
    @csrf
    @method('PATCH')
<div class="modal-body p-4">
    <div class="mb-3">
        <label for="category_id">Category</label><span class="text-danger"> *</span>
        @if ($task->manpower_id!=null)
        <input type="text" class="form-control" disabled value="{{$task->manpower->categoryName->name}}">
        @else
        <select class="form-control select2" data-toggle="select2" name="category_id" id="category_id" required>
            <option>Select</option>
            @if ($categories!=null)
                @foreach ($categories as $category)
                {{-- @if ($task->manpower_id!=null)
                <option value="{{$category->id}}" {{ old('category_id',$task->manpower->categoryName->id) == $category->id ? "selected" : "" }}>{{$category->name}}</option>
                @else --}}
                <option value="{{$category->id}}" {{ old('category_id',) == $category->id ? "selected" : "" }}>{{$category->name}}</option>
                {{-- @endif --}}
                @endforeach
            @endif
        </select>
        @endif

    </div>
    <div class="mb-3">
        <label for="subcategory_id">Sub Category</label><span class="text-danger"> *</span>
        @if ($task->manpower_id!=null)
            @if ($task->manpower->sub_category!=null)
                <input type="text" class="form-control" disabled value="{{$task->manpower->sub_category->name}}">
            @endif
        @else
        <select class="form-control select2" data-toggle="select2" name="subcategory_id" id="subcategory_id" required>
            {{-- @if ($task->manpower_id!=null)
            @if ($task->manpower->sub_category!=null)
            <option selected disabled>{{$task->manpower->sub_category->name}}</option>
            @endif
            @endif --}}
        </select>
        @endif

    </div>
    <div class="mb-3">
        <label for="manpower_id">Manpower</label><span class="text-danger"> *</span>
        @if ($task->manpower_id!=null)
        <input type="text" class="form-control" disabled value="{{$task->manpower->name}}">
        @else
        <select class="form-control select2" data-toggle="select2" name="manpower_id" id="manpower_id" required>
            {{-- @if ($task->manpower_id!=null)
            <option value="{{$task->manpower_id}}" selected disabled>{{$task->manpower->name}}</option>
            @endif --}}
        </select>
        @endif
    </div>
    <div class="mb-3">
        <label for="manpower_cost">Manpower Cost</label><span class="text-danger"> *</span>
        @if ($task->manpower_cost!=0)
            <input type="text" class="form-control" value="Rs. {{$task->manpower_cost}}" disabled> 
        @else
            <input type="number" class="form-control" name="manpower_cost" value="{{old('manpower_cost')}}" id="manpower_cost" placeholder="Enter Total Cost">
        @endif

    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
    @if ($task->manpower_id!=null)
    @else
    <button type="submit" class="btn btn-primary">Assign</button>
    @endif
</div>
</form>
