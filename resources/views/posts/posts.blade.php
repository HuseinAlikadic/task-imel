@extends('layouts.app')

@section('content')

<div class="container">
    <div class="bg-secondary row">
        <div class="col-sm-10">
            <h3 class="pt-3">Blog post list</h3>
        </div>
        <div class="col-sm-2">
            <a href="/addPost"><button type="button" class=" btn btn-success mt-2 mb-2">New Blog Post</button></a>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>TITLE</th>
                <th>DATE</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(post,index) in showAllPost">
                <td style="width: 70%"> @{{post.title}} </td>
                <td style="width: 20%">@{{post.date}}</td>
                <td>
                    <a :href="'/post/'+post.id" class="pr-1"><i class="fas fa-globe-americas"></i></a>
                    <a :href="'api/post/edit/'+post.id" class="pr-1"><i class="fas fa-pen"></i></a>
                    <i class="fas fa-trash pr-1" data-toggle="modal" data-target="#confirmDeletePost" @click="deletePost(index)"></i>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- Modal to confirm delete -->
    <div class="modal fade" id="confirmDeletePost">
        <div class="modal-dialog modal-dialog-centered">
            <form action="/api/posts/delete-post" method="POST">
                @csrf
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Confirm the deletion.</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <input type="hidden" :value="deletedPostId" name="id">
                        <h4>Do you want to delete @{{deletedPostName}}?</h4>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Delete</button>
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
        name: 'Posts',
        data() {
            return {
                showAllPost: <?= $showAllPost ?>,
                deletedPostName: "",
                deletedPostId: ""
            }
        },
        methods: {
            deletePost: function(index) {
                this.deletedPostName = this.showAllPost[index].title;
                this.deletedPostId = this.showAllPost[index].id;
            }
        }


    });
</script>
@endsection