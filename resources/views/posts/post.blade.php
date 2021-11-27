@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card">
        <div class="card-header bg-secondary text-white">
            <h4 class="text-capitalize text-center">Detailed information about the post</h4>
        </div>
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="col-md-8  ">
                        <label class="font-weight-bold">Title</label>
                        <p class="border">@{{showOnePost.title}}</p>
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold">Date</label>
                        <p class="border">@{{showOnePost.date}}</p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-8">
                        <label class="font-weight-bold">Content</label>
                        <p class="border">@{{showOnePost.content}}</p>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col">
                                <label class="font-weight-bold">Image</label>
                            </div>
                            <div class="col ">
                                <img :src="'/postImage/'+showOnePost.imageUrl" alt="image" width="300px" height="300px" class="img-responsive">
                            </div>
                        </div>
                    </div>
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
                showOnePost: <?= $showOnePost ?>


            }
        },


    });
</script>
@endsection