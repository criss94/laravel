@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Alta de un nuevo producto</div>

                <div class="panel-body">
                    
                    <form action="{{ route('products.update', $p->id) }}" method="POST" enctype="multipart/form-data">
                        <table class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <td>
                                    <input type="text" size="30" name="name" value="{{ $p->name }}">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>
                                    <textarea name="description" cols="30" rows="2">{{ $p->description }}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>
                                    <input type="text" size="30" name="price" value="{{ $p->price }}">
                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>
                                    <select name="cat_id">
                                        <option value="">Seleccionar</option>
                                        @foreach($category as $c)
                                            <option <?php if($p->cat_id == $c->id){ echo 'selected'; } ?> value="{{ $c->id }}">{{ $c->cat_name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('cat_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('cat_id') }}</strong>
                                        </span>
                                    @endif  
                                </td>
                            </tr>
                            <tr>
                                <th>Image Actually</th>
                                <td>
                                    <img src="/images/{{ $p->photo }}" width="80">
                                    <input type="hidden" name="dropImage" value="{{ $p->photo }}">
                                </td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td>
                                    <label for="photo" style="width: 200px;overflow: hidden;">
                                        <input type="file" name="photo">
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="submit" class="btn btn-primary btn-md" value="update">
                                    <a href="/home" class="btn btn-info btn-md">volver</a>
                                </td>
                            </tr>
                        </table>
                    </form>
                        
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
