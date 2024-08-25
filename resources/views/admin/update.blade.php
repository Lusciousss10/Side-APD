<x-apps-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-100">
                    <h1 class="mb-0">Edit User</h1>
                    <hr class="border-gray-700"/>
                    <form action="{{ route('admin/users/update', $users->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label text-gray-100">Name</label>
                                <input type="text" name="name" class="form-control bg-gray-800 text-gray-100 border-gray-700" placeholder="Name" value="{{$users->name}}">
                                @error('name')
                                <span class="text-danger text-sm">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label text-gray-100">Email</label>
                                <input type="text" name="email" class="form-control bg-gray-800 text-gray-100 border-gray-700" placeholder="Email" value="{{$users->email}}">
                                @error('email')
                                <span class="text-danger text-sm">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label text-gray-100">Usertype</label>
                                <input type="text" name="usertype" class="form-control bg-gray-800 text-gray-100 border-gray-700" placeholder="Usertype" value="{{$users->usertype}}">
                                @error('usertype')
                                <span class="text-danger text-sm">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-grid">
                                <button class="btn btn-warning bg-yellow-600 text-gray-100 border-gray-700 hover:bg-yellow-500">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-apps-layout>
