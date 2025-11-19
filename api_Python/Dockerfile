# Escolhe a imagem base do Python
FROM python:3.11-slim

# Define variáveis de ambiente
ENV PYTHONDONTWRITEBYTECODE 1
ENV PYTHONUNBUFFERED 1

# Atualiza apt e instala dependências do sistema
RUN apt-get update && apt-get install -y \
    build-essential \
    libpq-dev \
    git \
    curl \
    && rm -rf /var/lib/apt/lists/*

# Cria diretório da aplicação
WORKDIR /app

# Copia os arquivos do projeto
COPY . /app

# Cria e ativa virtualenv (opcional, mas recomendado)
RUN python -m venv /opt/venv
ENV PATH="/opt/venv/bin:$PATH"

# Instala as dependências do FastAPI
RUN pip install --upgrade pip
RUN pip install fastapi uvicorn[standard] pydantic

# Expõe a porta do Uvicorn
EXPOSE 8000

# Comando para rodar o FastAPI com autoreload
CMD ["uvicorn", "main:app", "--host", "0.0.0.0", "--port", "8000"]
