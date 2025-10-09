<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pacientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <!-- Cabeçalho -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Lista de Pacientes</h1>
                    <a href="{{ route('patient.create') }}" class="btn btn-primary">
                        Novo Paciente
                    </a>
                </div>

                <!-- Mensagens de Sucesso/Erro -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- Tabela de patients -->
                @if($patients->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Idade</th>
                                    <th>CPF</th>
                                    <th>Mãe</th>
                                    <th>Endereço</th>
                                    <th>Telefone</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($patients as $patient)
                                    <tr>
                                        <td>{{ $patient->id }}</td>
                                        <td>{{ $patient->name }}</td>
                                        <td>{{ $patient->age }}</td>
                                        <td>{{ $patient->cpf }}</td>
                                        <td>{{ $patient->mom }}</td>
                                        <td>{{ $patient->address}}</td>
                                        <td>{{ $patient->phone }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <!-- Visualizar -->
                                                <a href="{{ route('patient.show', $patient->id) }}" 
                                                   class="btn btn-info btn-sm" 
                                                   title="Visualizar">
                                                    👁️
                                                </a>
                                                
                                                <!-- Editar -->
                                                <a href="{{ route('patient.edit', $patient->id) }}" 
                                                   class="btn btn-warning btn-sm" 
                                                   title="Editar">
                                                    ✏️
                                                </a>
                                                
                                                <!-- Excluir -->
                                                <form action="{{ route('patient.destroy', $patient->id) }}" 
                                                      method="POST" 
                                                      class="d-inline"
                                                      onsubmit="return confirm('Tem certeza que deseja excluir este paciente?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Excluir">
                                                        🗑️
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-info text-center">
                        <h4>Nenhum paciente encontrado</h4>
                        <p>Clique no botão "Novo paciente" para adicionar o primeiro paciente.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>