@props(['timeout' => 5000])

@if ($errors->any())
    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const errorMessages = @json($errors->all());

                let errorHtml = '<ul class="text-left">';
                errorMessages.forEach(function(error) {
                    errorHtml += '<li>' + error + '</li>';
                });
                errorHtml += '</ul>';

                Swal.fire({
                    title: '{{ __("¡Ups! Algo ha salido mal.") }}',
                    html: errorHtml,
                    icon: 'error',
                    timer: {{ $timeout }},
                    timerProgressBar: true,
                    showConfirmButton: true,
                    confirmButtonText: 'Entendido',
                    customClass: {
                        container: 'validation-errors-popup',
                        popup: 'rounded-lg',
                        title: 'text-red-600 font-medium',
                        htmlContainer: 'text-sm text-red-600'
                    }
                });
            });
        </script>
    @endpush
@endif
