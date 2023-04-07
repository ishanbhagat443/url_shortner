@section('head-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="card">
                    <div class="card-header">
                        <form method="POST" action="{{ route('generate.shorten.link.post') }}">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" name="link" class="form-control" placeholder="Enter URL"
                                    aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-success text-green-500" type="submit">Generate Shorten
                                        Link</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">

                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif

                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Short Link</th>
                                    <th>Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($shortLinks) > 0)
                                    @foreach ($shortLinks as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td><a class="text-blue-500 underline"
                                                    href="{{ route('shorten.link', $row->code) }}"
                                                    target="_blank">{{ url('shlnk/' . $row->code) }}</a></td>
                                            <td>{{ $row->link }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="text-center font-bold" colspan="3">No Data Found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>







            </div>
        </div>
    </div>
</x-app-layout>
