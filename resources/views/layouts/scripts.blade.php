<script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
<script
    src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
    integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script src="{{asset('js/jquery.jscroll.min.js')}}"></script>
<script src="{{asset('js/croppie.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>

<script>
    $(document).ready(function () {
        //https://owlcarousel2.github.io/OwlCarousel2/docs/started-welcome.html
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });

        //https://datatables.net/
        $('#table_id').DataTable({
            "scrollX": true,
            responsive: true,
            processing: true,
            scrollY: '70vh',
            scrollCollapse: true,
            paging: false,

            oLanguage: {
                sProcessing: "Obteniendo datos...",
                sLengthMenu: "Mostrar _MENU_ resultados",
                sSearch: "Buscar por todos los campos:",
                sZeroRecords: "No se encontraron resultados",
                sEmptyTable: "Ningún dato disponible en esta tabla",
                sInfo: "Mostrando página _PAGE_ de _PAGES_",
                sInfoEmpty: "No hay datos disponibles",
                sInfoFiltered: "(Filtrados de un total de _MAX_ registros)",
                sInfoPostFix: "",
                sUrl: "",
                sInfoThousands: ",",
                sLoadingRecords: "Cargando...",
                oPaginate: {
                    sFirst: "Primero",
                    sLast: "Último",
                    sNext: "Siguiente",
                    sPrevious: "Anterior"
                },
            }
        })
    });
</script>

<script>
    $(document).ready(function () {

        $('ul.pagination').hide();
        $(function () {
            $('.infinite-scroll').jscroll({
                autoTrigger: true,
                loadingHtml: '<img style="width:25%;margin:auto;display: flex;align-items: center;justify-content: center;" class="center-block" src="{{asset('/images/loading.gif')}}" alt="Cargando..." />',
                loadingFunction: function(){
                },
                padding: 200,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.infinite-scroll',
                callback: function () {
                    $('ul.pagination').remove();

                }
            });
        });
    })

</script>
<script>
    $(document).ready(function(){

        $image_crop = $('#image-preview').croppie({
            enableExif:true,
            viewport:{
                width:200,
                height:200,
                type:'circle'
            },
            boundary:{
                width:300,
                height:300
            }
        });

        $('#upload_image').change(function(){
            var reader = new FileReader();

            reader.onload = function(event){
                $image_crop.croppie('bind', {
                    url:event.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
        });

        $('.crop_image').click(function(event){
            $image_crop.croppie('result', {
                type:'canvas',
                size:'viewport'
            }).then(function(response){
                var _token = $('input[name=_token]').val();
                $.ajax({
                    url:'{{ route("image_crop.upload") }}',
                    type:'post',
                    data:{"image":response, _token:_token},
                    dataType:"json",
                    success:function(data)
                    {
                        var crop_image = '<img src="{{asset('/')}}'+data.path+'" />';
                        $('#uploaded_image').html(crop_image);
                    }
                });
            });
        });

    });
</script>

<script>
    $('#fileupload').fileupload();
</script>
