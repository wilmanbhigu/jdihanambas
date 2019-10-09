@extends('layouts.manage')

@section('title')
    Create New Blog Post
@endsection

@section('content')
    <div class="flex-container">
        <div class="column is-10 is-offset-2 m-t-50">
            <h1 class="title m-b-5">Create New Post</h1>
            <hr class="m-t-5">

            @if(session('status'))
				<div class="alert alert-success">
					{{session('status')}}
				</div>
			@endif

            <div class="columns">
                <div class="column">
                    <form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="columns">
                            <div class="column is-9">
                                <div class="field">
                                    <p class="control">
                                        <input type="text" name="title" class="input" placeholder="Title" v-model="title">
                                    </p>
                                </div>
                                <div class="field">
                                    <slug-widget url="{{url('/blog')}}/" :title="title" @slug-changed="updateSlug"></slug-widget>
                                    <input type="hidden" v-model="slug" name="slug" />
                                </div>
                                <br>
                                <b-field>
                                    <b-input type="textarea"
                                        name="blog"
                                        v-model="blog"
                                        rows="30"
                                        placeholder="Make original content don't copy paste!!!">
                                    </b-input>
                                </b-field>
                            </div>
                            <div class="column is-3">
                                <div class="columns">
                                    <div class="column is-full">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="field">
                                                    <label for="">Blog Cover</label>
                                                    <p class="control">
                                                        <input type="file" name="cover" id="cover">
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="columns">
                                    <div class="column is-full">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="media">
                                                    <div class="media-left">
                                                    <figure class="image is-48x48">
                                                        <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                                    </figure>
                                                    </div>
                                                    <div class="media-content">
                                                        <p class="title is-5">Zulfikar</p>
                                                        <p class="subtitle is-6">@fikar14</p>
                                                    </div>
                                                </div>
                                                <div class="media">
                                                    <div class="media-content">
                                                    <p class="is-size-7 has-text-centered"><strong>Draft Saved</strong> a few minutes ago (saved)</p>
                                                    </div>
                                                </div>
                                                <div class="columns is-variable is-1">
                                                    <div class="column is-6 save-draft">
                                                        <button class="button is-link is-outlined is-fullwidth" name="save_action" value="DRAFT">Save Draft</button>
                                                    </div>
                                                    <div class="column is-6 publish-button">
                                                        <button class="button is-success is-fullwidth" name="save_action" value="PUBLISH">Publish</button>
                                                    </div>
                                                </div>
                                            </div>                                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form> <!-- end of form -->                        
                </div> <!-- end of is-three-quarters -->
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        var app= new Vue({
            el:'#app',
            data() {         
                return {
                    title: '',
                    slug: '',
                    blog: '',
                    cover: null

                    // api_token: '{{Auth::user()}}'

                }       

                
            },
            
            methods: {
                updateSlug: function(val){
                    this.slug = val;
                }
            }
        });
    </script>
@endsection