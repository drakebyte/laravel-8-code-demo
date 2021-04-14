<form action="{{ route('customers.destroy', ['customer' => $customer]) }}" method="POST" style='display:inline;'>
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger">Delet</button>
</form>