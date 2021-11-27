@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card">
        <div class="card-header bg-secondary text-white">
            <h4 class="text-capitalize text-center">Detailed information about the post </h4>
        </div>
        <div class="card-body">
            <form action="/api/edited-post" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control" v-model="showOnePost.id" name="id">
                <div class="form-row">
                    <div class="col-md-8">
                        <label>Title</label>
                        <input type="text" placeholder="Title" class="form-control" name="title" v-model="showOnePost.title" required />
                    </div>
                    <div class="col-md-4">
                        <label>Date</label>
                        <input type="date" placeholder="" class="form-control" name="date" v-model="showOnePost.date" required />
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-8">
                        <label>Content</label>
                        <input type="text" placeholder="Content" class="form-control" min-width="250px" name="content" v-model="showOnePost.content" required />
                    </div>
                    <div class="col-md-4">
                        <label>Image</label>
                        <img :src="'/postImage/'+showOnePost.imageUrl" width="200px" height="200px" class=" float-left">
                        <input type="file" class="form-control" name="imageUrl" />
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
                <div style=" margin-top:15px;" class="float-right">
                    <a href="/"><button type="button" class="btn btn-danger rounded-0">Cancel</button> </a>
                    <button type="submit" class="btn btn-success rounded-0">Edit Post</button>
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
        name: 'EditPost',
        data() {
            return {
                showOnePost: <?= $showOnePost ?>,
                showSelectImg: false
            }
        },
        methods: {


        }
    });
</script>
@endsection