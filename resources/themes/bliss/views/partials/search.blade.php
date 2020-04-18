<form class="production_search" action="{{url('categorysearch')}}">
	<input type="hidden" name="category">
    <input type="text" class="form-control" placeholder="search..." value="{{request('term')}}" name="term">
    <button>
        <img src="/themes/bliss/assets/images/hg/icons/magnifying-glass-product.png" alt="magnifying-glass-product">
    </button>
</form>