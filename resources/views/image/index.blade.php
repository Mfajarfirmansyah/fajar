<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <!-- Bootstrap Icons -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>

    
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" ="#">GALERI</a>
        </div>
      </nav>
    <div class="container text-center">
        @foreach ($images as $image)
        <div class="position-relative d-inline-block">
            @if (Str::endsWith($image->image, ['.png', '.jpg', '.jpeg', '.gif']))
                <img src="{{ asset('/image/'.$image->image) }}" width="640" height="360" class="card-img-top" alt="Image">
            @elseif (Str::endsWith($image->image, ['.mp4', '.avi', '.mov', '.wmv']))
                <video width="640" height="360" controls class="card-img-top">
                    <source src="{{ asset('/storage/'.$image->image) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            
            @else
                Unsupported file format.
            @endif
            <form action="{{ route('images.destroy',$image->id) }}" method="POST" class="position-absolute" style="top: 10px; right: 10px;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus foto ini?')">
                    <i class="bi bi-trash-fill"></i>
                </button>
            </form>
        </div>
        
                <div>{{ $image->caption }}</div>
                <div>{{ $image->created_at->format('d F Y') }}</div>
                {{-- <form action="{{ route('images.destroy',$image->id) }}" method="POST"> --}}

                    @csrf
                    @method('DELETE')
        
                 
                </form>
            <br>
        @endforeach
        <a class="btn btn-warning" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        <a class="btn btn-success" href="{{ route('images.create') }}">Add</a>
        
            </td>
        </tr>
        {{ $images->links() }}
    </div>
</body>
</htm