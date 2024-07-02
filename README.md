# Athen - REST API (test of an unknown company)

## Task
REST API production and design are negligible (this is also why the poor Blade templates are ugly)
- [x] Use soft delete in all three tables. 
- [x] Workers and customers can only be deleted if there are no active (inprogress) tasks assigned. If you have an active task, return a standard error message.
- [ ] Each task belongs to a costumer, but several workers can be assigned to it.
- [x] The customer can no longer be edited in a task.
- [x] It is mandatory for the customer to enter all data.
- [x] It is mandatory to enter all data for the Task, including the GPS coordinates, in the event that the customer's GPS coordinates have been set by the system. (Maybe good)
- [x] Create ReadMe. (Yes, that's what you see now)

## Data Table
### Costumer
| Name | Type |
| ---- | ---- |
| ID | bigint |
| fullName | varchar |
| email | varchar |
| phone | varchar |
| coordinate | text |
| deleted_at | timestamp |
| created_at | timestamp |
| updated_at | timestamp |

### Worker
| Name | Type |
| ---- | ---- |
| ID | bigint |
| firstName | varchar |
| lastName | varchar |
| email | varchar |
| coordinate | text |
| deleted_at | timestamp |
| created_at | timestamp |
| updated_at | timestamp |

### Task
| Name | Type |
| ---- | ---- |
| ID | int |
| costumer_id | bigint |
| worker_id | bigint |
| description | text |
| type | enum |
| status | enum |
| coordinate | text |
| deleted_at | timestamp |
| created_at | timestamp |
| updated_at | timestamp |

## Short Story
> [!CAUTION]
> I have no idea what to write in README

