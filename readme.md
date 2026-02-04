# Achiever Backend

This repository contains the backend services for the Achiever project, built using Symfony and containerized with Docker.

## Services Overview

The application stack is composed of the following Docker services:

### 1. `symfony_app`
- **Description:** Runs the Symfony PHP application.
- **Build Context:** `./app` directory.
- **Ports:** Exposes port `8000` on the host, mapping to port `8000` inside the container.
- **Environment Variables:**
  - `DATABASE_URL`: PostgreSQL connection string.
  - `MESSENGER_TRANSPORT_DSN`: AMQP URL for RabbitMQ messaging.
  - `REDIS_URL`: Redis connection URL.
- **Dependencies:** Depends on the `database`, `rabbitmq`, and `redis` services to be running.
- **Volumes:** Mounts local `./app` directory to `/app` inside the container.
- **Command:** Starts the built-in PHP server at `0.0.0.0:8000` with document root at `public`.

### 2. `database`
- **Image:** `postgres:15`
- **Ports:** Maps PostgreSQL default port `5432` to the host.
- **Environment Variables:**
  - `POSTGRES_USER`: Database username.
  - `POSTGRES_PASSWORD`: Database password.
  - `POSTGRES_DB`: Database name.
- **Volumes:** Persists data in Docker volume `pgdata`.

### 3. `rabbitmq`
- **Image:** `rabbitmq:3-management`
- **Ports:** 
  - AMQP messaging port `5672`
  - Management UI port `15672`

### 4. `redis`
- **Image:** `redis:alpine`
- **Ports:** Maps Redis default port `6379` to the host.

### 5. `adminer`
- **Image:** `adminer`
- **Ports:** Maps Adminer database management interface to port `8080`.
- **Restart Policy:** Always restarts on failure.

## Volumes
- `pgdata`: Used to persist PostgreSQL database data.

## Getting Started

### Prerequisites
- Docker and Docker Compose installed on your machine.

### Running the Application

Clone the repository:

```bash
git clone https://github.com/S-v-3-n/achiever-backend.git
cd achiever-backend
```


## Start the services:

```bash
docker-compose up --build
```