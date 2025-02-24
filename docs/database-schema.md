erDiagram
    users ||--o{ bookings : makes
    users ||--o{ booking_logs : creates
    cars ||--o{ bookings : "booked for"
    bookings ||--o{ booking_logs : generates

    users {
        bigint id PK
        varchar name
        varchar email
        varchar password
        enum role
        timestamp created_at
        timestamp updated_at
    }

    cars {
        bigint id PK
        varchar name
        text features
        boolean is_available
        timestamp created_at
        timestamp updated_at
    }

    bookings {
        bigint id PK
        bigint user_id FK
        bigint car_id FK
        datetime start_time
        datetime end_time
        enum purpose
        enum status
        text booking_reason
        text admin_notes
        timestamp created_at
        timestamp updated_at
    }

    booking_logs {
        bigint id PK
        bigint booking_id FK
        bigint user_id FK
        enum status
        text notes
        timestamp created_at
    }
