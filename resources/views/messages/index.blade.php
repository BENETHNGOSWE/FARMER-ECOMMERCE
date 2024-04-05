@extends('dashboard/layouts.main')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">

            <h1 class="text-center my-4">Chat</h1>
        
            <!-- Display previous messages -->
            <div id="messages" class="mb-4">
                @foreach ($messages as $message)
                    <div class="card mb-2">
                        <div class="card-body">
                            <strong>{{ $message->user->name }}</strong>: {{ $message->message_content }}
                            <!-- Display replies -->
                            @if ($message->replies)
                                @foreach ($message->replies as $reply)
                                    <div class="card mt-2">
                                        <div class="card-body">
                                            <strong>{{ $reply->user->name }}</strong>: {{ $reply->message_content }}
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <!-- Reply button -->
                            <button class="btn btn-primary mt-2"
                                onclick="replyToMessage({{ $message->id }}, '{{ $message->message_content }}')">Reply</button>
                        </div>
                    </div>
                @endforeach
            </div>
        
            <!-- Form to send a message -->
            <form id="message-form" action="{{ route('chat.send-message') }}" method="post" class="mb-4">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" id="parent_id" name="parent_id"> <!-- Hidden field for parent message ID -->
                <div class="form-group">
                    <textarea name="message_content" class="form-control" placeholder="Type your message here"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Send</button>
            </form>
        
        </div>
        
    </div>
    <!-- JavaScript function to set parent_id when replying to a message -->
    <script>
        function replyToMessage(parentId, originalMessage) {
            // Set the value of the parent_id field
            document.getElementById('parent_id').value = parentId;

            // Create a label for the original message
            var originalMessageLabel = document.createElement('label');
            originalMessageLabel.textContent = 'Replying to: ' + originalMessage;

            // Display a reply box
            var replyBox = document.createElement('textarea');
            replyBox.setAttribute('placeholder', 'Type your reply here');
            replyBox.setAttribute('name', 'message_content');
            replyBox.classList.add('form-control');

            // Append the original message label and the reply box to the form
            var form = document.getElementById('message-form');
            form.appendChild(originalMessageLabel);
            form.appendChild(replyBox);
        }
    </script>
@endsection
