# students Module

Also known as `students` module.

## Features

-   Fully Managed By students (CRUD).

## Related Modules

-   [Guest](./../../Guests/docs/README.md)
-   [Users Groups](./users-groups.md)

## Requests

### Admin Requests

#### List Users

**GET** `/admin/students`

Request Headers: [Request Headers](#request-headers)

Query Params (For Filtering)

-   `name`: Search For students By Name
-   `id`: Search For students By Id

Response Payload

-   [students Record](#students-record)

```json
{
    "records": "UserRecord[]"
}
```

## Create New students

This request allows admin to create new students from the admin dashboard.

**POST** `/admin/students`

Request Headers:

[Request Headers](#request-headers) +

-   **Content-Type**: `multipart/form-data`

Request Payload

| Key           | Type   | Required | Description   |
| ------------- | ------ | -------- | ------------- |
| **name**      | String | **Yes**  | students Name |
| **school_id** | int    | **Yes**  | students Name |

Response Payload

Success: `201`

-   [students Record](#students-record)
-   [Error Key Value](#error-key-value)

```json
{
    "record": "studentsRecord"
}
```

Bad Request `400`

```json
{
    "errors": "ErrorKeyValue[]"
}
```

### students Record

```json
{
    "id": "int",
    "name": "string"
}
```

### Error Key Value

```json
{
    "key": "string",
    "message": "string"
}
```
