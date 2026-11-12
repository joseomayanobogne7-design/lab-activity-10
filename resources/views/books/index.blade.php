<div class="container">
    <h2>Book List</h2>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Add New Book</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Genre</th>
                <th>Published Year</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <!-- Kinukuha ang name mula sa Genre lookup table -->
                    <td>{{ $book->genre->name ?? 'Uncategorized' }}</td>
                    <td>{{ $book->published_year }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>