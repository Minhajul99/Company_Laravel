<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Category') }}
        </h2>
    </x-slot>



    <div class="container py-12">
        <!-- All Category Show Part Is Here -->
        <div class="row py-5">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>All Category</h3>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Sl</th>
                                <th scope="col">User Id</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @php
                            $i = 1;
                        @endphp // For Normal Index // --}}
                            @foreach ($categories as $category)
                                <tr>
                                    {{-- <th scope="row">{{ $i++ }}</th> // For Normal Index // --}}
                                    <th scope="row">{{ $categories->firstItem() + $loop->index }}</th>
                                    {{-- For Paginate Index --}}
                                    <td>{{ $category->user->name }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{url('category/edit/'.$category->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{url('category/softdelete/'.$category->id)}}" class="btn btn-danger">Delete</a>


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $categories->links() }}
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Category</h3>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('addcategory') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Add Category</label>
                                <input type="text" name="category_name" class="form-control" id="category_name"
                                    placeholder="Select Your Category">
                                @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="" class="btn btn-primary">Add Category</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>


        <!-- Trash Data Part Is Here -->
        <div class="row">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Trash Data</h3>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Sl</th>
                                <th scope="col">User Id</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @php
                            $i = 1;
                        @endphp // For Normal Index // --}}
                            @foreach ($trashCats as $trashCat)
                                <tr>
                                    {{-- <th scope="row">{{ $i++ }}</th> // For Normal Index // --}}
                                    <th scope="row">{{ $categories->firstItem() + $loop->index }}</th>
                                    {{-- For Paginate Index --}}
                                    <td>{{ $trashCat->user->name }}</td>
                                    <td>{{ $trashCat->category_name }}</td>
                                    <td>{{ $trashCat->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{url('category/restore/'.$trashCat->id)}}" class="btn btn-info">Restore</a>
                                        <a href="{{url('category/delete/'.$trashCat->id)}}" class="btn btn-danger">Delete</a>


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $trashCats->links() }}
                </div>
            </div>
            <div class="col-md-4">

            </div>
        </div>
{{-- End Trash --}}

    </div>
</x-app-layout>
