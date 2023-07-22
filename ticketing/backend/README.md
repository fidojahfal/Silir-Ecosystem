
# Silir Pariwisata Seg. - Ticketing and Wahana

API untuk bagian ticketing dan wahana Pariwisata Silir.## API Reference

#### Get all tickets

```http
  GET /api/v1/ticket
```

#### Response - 200

```javascript
{
  "data": [
    {
      "ID": 70000000,
      "CreatedAt": "2023-07-17T17:03:05.265+07:00",
      "UpdatedAt": "2023-07-17T17:03:05.265+07:00",
      "DeletedAt": null,
      "Id_kategori": 1,
      "Fee": 40000,
      "Masuk": null,
      "KategoriWahana": {
        "ID": 1,
        "CreatedAt": "0001-01-01T00:00:00Z",
        "UpdatedAt": "0001-01-01T00:00:00Z",
        "DeletedAt": null,
        "Nama_kategori": "Air",
        "Available": true,
        "Ticket": null,
        "Wahana": null
      }
    },
    {
      "ID": 70000001,
      "CreatedAt": "2023-07-17T17:04:05.933+07:00",
      "UpdatedAt": "2023-07-17T17:04:05.933+07:00",
      "DeletedAt": null,
      "Id_kategori": 1,
      "Fee": 40000,
      "Masuk": null,
      "KategoriWahana": {
        "ID": 1,
        "CreatedAt": "0001-01-01T00:00:00Z",
        "UpdatedAt": "0001-01-01T00:00:00Z",
        "DeletedAt": null,
        "Nama_kategori": "Air",
        "Available": true,
        "Ticket": null,
        "Wahana": null
      }
    }
  ],
  "status": "1"
}
```

#### Get ticket by ID

```http
  GET /api/v1/ticket/${id}
```

#### Response - 200

```javascript
{
  "data": [
    {
      "ID": 70000000,
      "CreatedAt": "2023-07-17T17:03:05.265+07:00",
      "UpdatedAt": "2023-07-17T17:03:05.265+07:00",
      "DeletedAt": null,
      "Id_kategori": 1,
      "Fee": 40000,
      "Masuk": null,
      "KategoriWahana": {
        "ID": 1,
        "CreatedAt": "0001-01-01T00:00:00Z",
        "UpdatedAt": "0001-01-01T00:00:00Z",
        "DeletedAt": null,
        "Nama_kategori": "Air",
        "Available": true,
        "Ticket": null,
        "Wahana": null
      }
    }
  ],
  "status": "1"
}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Id dari tiket |

#### Store new ticket

```http
  POST /api/v1/ticket
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id_kategori`      | `string` | **Required**. Id dari kategori tiket |
| `fee`      | `string` | **Required**. Harga tiket |

#### Response - 200

```javascript
{
  "token": "dc5c2935-b9f1-4de9-aea9-a8d304ac06e8",
  "url": "https://app.sandbox.midtrans.com/snap/v3/redirection/dc5c2935-b9f1-4de9-aea9-a8d304ac06e8"
}
```

#### Validate ticket

```http
  POST /api/v1/ticket/validate
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id_tiket`      | `uint` | **Required**. Id dari tiket |
| `status`      | `uint` | **Required**. Tipe validasi (0 untuk scan masuk, 1 untuk scan wahana) |

#### Get all transactions

```http
  GET /api/v1/transaction
```

#### Response - 200

```javascript
{
  "data": [
    {
      "ID": "TR-70000000-1689588185",
      "id_tiket": 70000000,
      "status": 0,
      "Ticket": {
        "ID": 70000000,
        "CreatedAt": "2023-07-17T17:03:05.265+07:00",
        "UpdatedAt": "2023-07-17T17:03:05.265+07:00",
        "DeletedAt": null,
        "Id_kategori": 1,
        "Fee": 40000,
        "Masuk": null,
        "KategoriWahana": {
          "ID": 0,
          "CreatedAt": "0001-01-01T00:00:00Z",
          "UpdatedAt": "0001-01-01T00:00:00Z",
          "DeletedAt": null,
          "Nama_kategori": "",
          "Available": false,
          "Ticket": null,
          "Wahana": null
        }
      }
    },
    {
      "ID": "TR-70000001-1689588246",
      "id_tiket": 70000001,
      "status": 0,
      "Ticket": {
        "ID": 70000001,
        "CreatedAt": "2023-07-17T17:04:05.933+07:00",
        "UpdatedAt": "2023-07-17T17:04:05.933+07:00",
        "DeletedAt": null,
        "Id_kategori": 1,
        "Fee": 40000,
        "Masuk": null,
        "KategoriWahana": {
          "ID": 0,
          "CreatedAt": "0001-01-01T00:00:00Z",
          "UpdatedAt": "0001-01-01T00:00:00Z",
          "DeletedAt": null,
          "Nama_kategori": "",
          "Available": false,
          "Ticket": null,
          "Wahana": null
        }
      }
    }
  ],
  "status": "1"
}
```

#### Get all categories

```http
  GET /api/v1/category
```

#### Response - 200

```javascript
{
  "data": [
    {
      "ID": 1,
      "CreatedAt": "0001-01-01T00:00:00Z",
      "UpdatedAt": "0001-01-01T00:00:00Z",
      "DeletedAt": null,
      "Nama_kategori": "Air",
      "Available": true,
      "Ticket": null,
      "Wahana": [
        {
          "ID": 1,
          "CreatedAt": "0001-01-01T00:00:00Z",
          "UpdatedAt": "0001-01-01T00:00:00Z",
          "DeletedAt": null,
          "Id_kategori": 1,
          "Nama_wahana": "Arung Jeram",
          "Fee": 20000,
          "KategoriWahana": {
            "ID": 0,
            "CreatedAt": "0001-01-01T00:00:00Z",
            "UpdatedAt": "0001-01-01T00:00:00Z",
            "DeletedAt": null,
            "Nama_kategori": "",
            "Available": false,
            "Ticket": null,
            "Wahana": null
          }
        },
        {
          "ID": 2,
          "CreatedAt": "0001-01-01T00:00:00Z",
          "UpdatedAt": "0001-01-01T00:00:00Z",
          "DeletedAt": null,
          "Id_kategori": 1,
          "Nama_wahana": "Seluncur Air",
          "Fee": 10000,
          "KategoriWahana": {
            "ID": 0,
            "CreatedAt": "0001-01-01T00:00:00Z",
            "UpdatedAt": "0001-01-01T00:00:00Z",
            "DeletedAt": null,
            "Nama_kategori": "",
            "Available": false,
            "Ticket": null,
            "Wahana": null
          }
        }
      ]
    },
    {
      "ID": 2,
      "CreatedAt": "0001-01-01T00:00:00Z",
      "UpdatedAt": "0001-01-01T00:00:00Z",
      "DeletedAt": null,
      "Nama_kategori": "Kering",
      "Available": true,
      "Ticket": null,
      "Wahana": [
        {
          "ID": 3,
          "CreatedAt": "0001-01-01T00:00:00Z",
          "UpdatedAt": "0001-01-01T00:00:00Z",
          "DeletedAt": null,
          "Id_kategori": 2,
          "Nama_wahana": "Pijat Uslug-Uslug",
          "Fee": 9999999,
          "KategoriWahana": {
            "ID": 0,
            "CreatedAt": "0001-01-01T00:00:00Z",
            "UpdatedAt": "0001-01-01T00:00:00Z",
            "DeletedAt": null,
            "Nama_kategori": "",
            "Available": false,
            "Ticket": null,
            "Wahana": null
          }
        }
      ]
    }
  ],
  "status": "1"
}
```

#### Get category by ID

```http
  GET /api/v1/category/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Id dari kategori |

#### Response - 200

```javascript
{
  "data": [
    {
      "ID": 1,
      "CreatedAt": "0001-01-01T00:00:00Z",
      "UpdatedAt": "0001-01-01T00:00:00Z",
      "DeletedAt": null,
      "Nama_kategori": "Air",
      "Available": true,
      "Ticket": null,
      "Wahana": [
        {
          "ID": 1,
          "CreatedAt": "0001-01-01T00:00:00Z",
          "UpdatedAt": "0001-01-01T00:00:00Z",
          "DeletedAt": null,
          "Id_kategori": 1,
          "Nama_wahana": "Arung Jeram",
          "Fee": 20000,
          "KategoriWahana": {
            "ID": 0,
            "CreatedAt": "0001-01-01T00:00:00Z",
            "UpdatedAt": "0001-01-01T00:00:00Z",
            "DeletedAt": null,
            "Nama_kategori": "",
            "Available": false,
            "Ticket": null,
            "Wahana": null
          }
        },
        {
          "ID": 2,
          "CreatedAt": "0001-01-01T00:00:00Z",
          "UpdatedAt": "0001-01-01T00:00:00Z",
          "DeletedAt": null,
          "Id_kategori": 1,
          "Nama_wahana": "Seluncur Air",
          "Fee": 10000,
          "KategoriWahana": {
            "ID": 0,
            "CreatedAt": "0001-01-01T00:00:00Z",
            "UpdatedAt": "0001-01-01T00:00:00Z",
            "DeletedAt": null,
            "Nama_kategori": "",
            "Available": false,
            "Ticket": null,
            "Wahana": null
          }
        }
      ]
    }
  ],
  "status": "1"
}
```

#### Get category by ID

```http
  PUT /api/v1/category/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Id dari kategori |
| `Nama_kategori`      | `string` | **Required**. Nama baru kategori |
| `Available`      | `bool` | **Required**. Status ketersediaan |

#### Response - 200

```javascript
```

#### Get all rides

```http
  GET /api/v1/ride
```

#### Response - 200

```javascript
{
  "data": [
    {
      "ID": 1,
      "CreatedAt": "0001-01-01T00:00:00Z",
      "UpdatedAt": "0001-01-01T00:00:00Z",
      "DeletedAt": null,
      "Id_kategori": 1,
      "Nama_wahana": "Arung Jeram",
      "Fee": 20000,
      "KategoriWahana": {
        "ID": 1,
        "CreatedAt": "0001-01-01T00:00:00Z",
        "UpdatedAt": "0001-01-01T00:00:00Z",
        "DeletedAt": null,
        "Nama_kategori": "Air",
        "Available": true,
        "Ticket": null,
        "Wahana": null
      }
    },
    {
      "ID": 2,
      "CreatedAt": "0001-01-01T00:00:00Z",
      "UpdatedAt": "0001-01-01T00:00:00Z",
      "DeletedAt": null,
      "Id_kategori": 1,
      "Nama_wahana": "Seluncur Air",
      "Fee": 10000,
      "KategoriWahana": {
        "ID": 1,
        "CreatedAt": "0001-01-01T00:00:00Z",
        "UpdatedAt": "0001-01-01T00:00:00Z",
        "DeletedAt": null,
        "Nama_kategori": "Air",
        "Available": true,
        "Ticket": null,
        "Wahana": null
      }
    },
    {
      "ID": 3,
      "CreatedAt": "0001-01-01T00:00:00Z",
      "UpdatedAt": "0001-01-01T00:00:00Z",
      "DeletedAt": null,
      "Id_kategori": 2,
      "Nama_wahana": "Pijat Uslug-Uslug",
      "Fee": 10000000,
      "KategoriWahana": {
        "ID": 2,
        "CreatedAt": "0001-01-01T00:00:00Z",
        "UpdatedAt": "0001-01-01T00:00:00Z",
        "DeletedAt": null,
        "Nama_kategori": "Kering",
        "Available": true,
        "Ticket": null,
        "Wahana": null
      }
    }
  ],
  "status": "1"
}
```

#### Get ride by ID

```http
  GET /api/v1/ride/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `string` | **Required**. Id dari wahana |

#### Response - 200

```javascript
{
  "data": [
    {
      "ID": 1,
      "CreatedAt": "0001-01-01T00:00:00Z",
      "UpdatedAt": "0001-01-01T00:00:00Z",
      "DeletedAt": null,
      "Id_kategori": 1,
      "Nama_wahana": "Arung Jeram",
      "Fee": 20000,
      "KategoriWahana": {
        "ID": 1,
        "CreatedAt": "0001-01-01T00:00:00Z",
        "UpdatedAt": "0001-01-01T00:00:00Z",
        "DeletedAt": null,
        "Nama_kategori": "Air",
        "Available": true,
        "Ticket": null,
        "Wahana": null
      }
    }
  ],
  "status": "1"
}
```


