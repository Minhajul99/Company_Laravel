<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Category') }}
        </h2>
    </x-slot>



    <div class="container py-12">
        <div class="row">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Update Category</h3>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('updatecategory',$category->id) }}" method="POST">
                            {{-- action="{{ url('/category/update/'.$category->id) }}"  <-- For Using URL --> --}}
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Update Category</label>
                                <input type="text" name="category_name" class="form-control" id="category_name"
                                    value="{{$category->category_name}}">
                                @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="" class="btn btn-primary">Update Category</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
