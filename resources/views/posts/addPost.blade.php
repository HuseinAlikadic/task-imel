@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card">
        <div class="card-header bg-secondary text-white">
            <h4 class="text-capitalize text-center">add blog post </h4>
        </div>
        <div class="card-body">
            <form action="api/add-new-post" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-md-8">
                        <label>Title</label>
                        <input type="text" placeholder="Title" class="form-control" name="title" required />
                    </div>
                    <div class="col-md-4">
                        <label>Date</label>
                        <input type="date" placeholder="" class="form-control" name="date" required />
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-8">
                        <label>Content</label>
                        <input type="text" placeholder="Content" class="form-control" name="content" required />
                    </div>
                    <div class="col-md-4">
                        <label>Image</label>
                        <input type="file" class="form-control" name="imageUrl" required />
                    </div>
                </div>
                <div style="margin-top:15px " class="float-right">
                    <a href="/"><button type="button" class="btn btn-danger rounded-0">Cancel</button> </a>
                    <button type="submit" class="btn btn-success rounded-0 ">Publish Post</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('vue-section')
<script>
    const app = new Vue({
        el: '#app',
        name: 'Post',
        data() {
            return {

            }
        },

    });
</script>
@endsection