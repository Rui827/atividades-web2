<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Paciente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Cabeçalho -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Detalhes do Paciente</h1>
                </div>

                <!-- Mensagens -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- Card com informações do paciente -->
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">Informações Pessoais</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <strong>ID:</strong>
                                <p class="text-muted">{{ $patient->id }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Data de Cadastro:</strong>
                                <p class="text-muted">{{ $patient->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <strong>Nome Completo:</strong>
                                <p class="text-muted">{{ $patient->name }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <strong>Data de Nascimento:</strong>
                                <p class="text-muted">
                                    @if($patient->age instanceof \Carbon\Carbon)
                                        {{ $patient->age->format('d/m/Y') }}
                                    @else
                                        {{ \Carbon\Carbon::parse($patient->age)->format('d/m/Y') }}
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Idade:</strong>
                                <p class="text-muted">
                                    @if($patient->age instanceof \Carbon\Carbon)
                                        {{ $patient->age->age }} anos
                                    @else
                                        {{ \Carbon\Carbon::parse($patient->age)->age }} anos
                                    @endif
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <strong>CPF:</strong>
                                <p class="text-muted">{{ $patient->cpf }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Telefone:</strong>
                                <p class="text-muted">{{ $patient->phone }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <strong>Nome da Mãe:</strong>
                                <p class="text-muted">{{ $patient->mom }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <strong>Endereço:</strong>
                                <p class="text-muted">{{ $patient->address }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botões de Ação -->
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('patient.index') }}" class="btn btn-outline-secondary">
                        ← Voltar
                    </a>
                    <div class="btn-group">
                        <a href="{{ route('patient.edit', $patient->id) }}" class="btn btn-warning">
                             Editar
                        </a>
                        <form action="{{ route('patient.destroy', $patient->id) }}" 
                              method="POST" 
                              class="d-inline"
                              onsubmit="return confirm('Tem certeza que deseja excluir este paciente?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                 Excluir
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
