<form action="{{ route('customers.destroy', ['customer' => $customer]) }}" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger">Delet</button>
</form>