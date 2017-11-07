<script>
    $(".rating").rating({min: 1, max: 5, step: 0.5, size: 'sm'}).on("rating.change", function (event, value) {
        var voted = false;
        var type = '{{ $data['type'] }}';
        var id = '{{ $data['id'] }}';
        if ($(this).data('id')) {
            id = $(this).data('id');
        }
        @if (Session::has('vote/' . $data['type'] . '/' . $data['id']))
            voted = true;
        @endif
        if (voted)
            alert("Вы уже голосовали!");
        else {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/vote/' + type + '/' + id,
                method: 'POST',
                data: {'rating': value},
                success: function (res) {
                    if (res == 1) {
                        alert("Спасибо за ваш голос!");
                        voted = true;
                    }
                    else {
                        alert("Вы уже голосовали!");
                    }
                }
            });
        }
    });
    $('.clear-rating').hide();
    $('.caption').hide();
</script>