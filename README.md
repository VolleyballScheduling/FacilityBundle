#Volleyball
##Summer Camp Scheduling System
###Facility Bundle

This is a bundle utilizing the facility component of the Volleyball Scheduling system.

##Documentation
- [Facility](Resources/doc/facility.md)
- [Quarters](Resources/doc/type.md)
- [Department](Resources/doc/department.md)
- [Faculty](Resources/doc/faculty.md)
- [Faculty Position](Resources/doc/position.md)

##Overview
###Controllers
- FacilityController
- QuartersController
- DepartmentController
- FacultyController
- PositionController

###Entities
- Facility
- Quarters
- Department
- Faculty
- Position

###Form Types
- FacilityFormType
- FacilitySearchFormType
- QuartersFormType
- QuartersSearchFormType
- DepartmentFormType
- DepartmentSearchFormType
- FacultyFormType
- FacultySearchFormType
- FacultyRegistrationFormType
- FacultyProfileFormType
- PositionFormType
- PositionSearchFormType

###Repositories
- FacilityRepository
- TypeRepository
- DepartmentRepository
- FacultyRepository
- LevelRepository
- PositionRepository
- AttendeeRepository

###Routes
Route Name | Route Path
---|---
volleyball_facility_index | facilities.%domain%
volleyball_facility_show | facilities.%domains/{slug}
volleyball_facility_new | facilities.%domains/new
volleyball_department_index | departments.%domain%
volleyball_department_show | departments.%domain%/{slug}
volleyball_department_new | departments.%domain%/new
volleyball_faculty_index | faculty.%domain%
volleyball_faculty_show | faculty.%domain%/{slug}
volleyball_faculty_new | faculty.%domain%/new
volleyball_quarters_index | quarters.%domain%
volleyball_quarters_show | quarters.%domain/{slug}
volleyball_quarters_new | quarters.%domain/new
volleyball_faculty_position_index | faculty.%domain/positions
volleyball_faculty_position_show | faculty.%domain/positions/{slug}
volleyball_faculty_position_new | faculty.%domain/positions/new
