<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('pacotes/vanilla_laratable/css/style.css') }}">

        {{-- Bootstrap icons --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    </head>
    <body class="antialiased">

        <div id="datatable"></div>

        <script src="{{ asset('pacotes/vanilla_laratable/js/script.js') }}"></script>
        <script>
            // No layout principal
            document.addEventListener('DOMContentLoaded', function() {
                let datatable = new VanillaDatatable({
                    url: '/users',
                    datatable_id: 'datatable',
                    columns: [
                        {type: 'data', name: 'id',label: 'ID', align: 'center', sortable: true},
                        {type: 'data', name: 'name', label: 'Nome', align: 'left', sortable: true},
                        {type: 'data', name: 'email', label: 'E-mail', align: 'left', sortable: true},
                        {type: 'data', name: 'created_at', label: 'Criado em', align: 'center', sortable: true, format: function(value){
                            return formatDateToPTBR(value)
                        }},
                        {
                            align: 'center', // left/center/right
                            type: 'actions',
                            label: 'Ações',
                            actions: [
                                {
                                    label: '<i class="bi bi-eye-fill"></i>',
                                    color: '#418ee5',
                                    function: 'show_user' // defina aqui sem parenteses
                                },
                                {
                                    label: '<i class="bi bi-pencil-fill"></i>',
                                    color: '#f2b727 ',
                                    function: 'edit_user' // defina aqui sem parenteses
                                },
                                {
                                    label: '<i class="bi bi-trash-fill"></i>',
                                    color: '#e54e41',
                                    function: 'delete_user' // defina aqui sem parenteses
                                }
                            ]
                        }
                    ],
                    per_page: {
                        visible: true,
                        label: 'Resultados por página',
                        options_values: [10, 20, 30],
                        all: {
                            visible: true,
                            label: 'Todos'
                        }
                    },
                    searchable: {
                        visible: true,
                        label: '',
                        placeholder: 'Buscar'
                    },
                    pagination: {
                        showing_x_of_y: {
                            visible: true,
                            label: 'Mostrando {perpage} de {total}'
                        },
                        buttons: {
                            type: 'minimal',
                            previous: {
                                label: '<i class="bi bi-caret-left-fill"></i>'
                            },
                            next: {
                                label: '<i class="bi bi-caret-right-fill"></i>'
                            }
                        }
                    },
                    sorting: {
                        types: {
                            asc: {
                                label: '<i class="bi bi-arrow-up"></i>'
                            },
                            desc: {
                                label: '<i class="bi bi-arrow-down"></i>'
                            },
                            default: {
                                label: '<i class="bi bi-arrow-down-up"></i>'
                            }
                        }
                    }
                });
                datatable.init();
            });

            function formatDateToPTBR(dateString) {
                // Cria um objeto Date a partir da string
                let date = new Date(dateString);

                // Extrai os componentes da data
                let day = date.getDate().toString().padStart(2, '0');
                let month = (date.getMonth() + 1).toString().padStart(2, '0'); // Mês começa em 0
                let year = date.getFullYear();

                // Extrai os componentes da hora
                let hours = date.getHours().toString().padStart(2, '0');
                let minutes = date.getMinutes().toString().padStart(2, '0');
                let seconds = date.getSeconds().toString().padStart(2, '0');

                // Retorna a data no formato pt-br
                return `${day}/${month}/${year} ${hours}:${minutes}:${seconds}`;
            }

            function show_user(id){
                console.log(id);
            }

            function edit_user(id){
                console.log(id);
            }

            function delete_user(id){
                console.log(id);
            }
        </script>
    </body>
</html>
