import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { Activity } from 'src/app/model/activity';
import { CivitatisAPIService } from 'src/app/services/civitatis-api.service';

@Component({
  selector: 'app-activity-list',
  templateUrl: './activity-list.component.html',
  styleUrls: ['./activity-list.component.scss']
})
export class ActivityListComponent implements OnInit {

  searchForm: FormGroup;

  attendanceDate: FormControl;
  attendanceNumber: FormControl;

  activities: Activity[] = [];

  constructor(
    private civitatisAPIService: CivitatisAPIService
  ) {

     // Create form controls
     this.attendanceDate = new FormControl('', [Validators.required]);
     this.attendanceNumber = new FormControl('', [Validators.required, Validators.min(1)]);

     // Create form group
     this.searchForm = new FormGroup({
       'attendance_date': this.attendanceDate,
       'attendance_number': this.attendanceNumber
     });

  }

  ngOnInit(): void {
    this.activities.push(new Activity(1, 'title1', 'description1', 100.1, new Date(), new Date()));
    this.activities.push(new Activity(2, 'title2', 'description2', 50.55, new Date(), new Date()));


    this.civitatisAPIService.getActivities().subscribe(data => {
      this.activities = data;
    }, error => {
      console.log(error);
    });
  }

  onSubmit(): void {
    // Search activities
    this.civitatisAPIService.getActivities(this.attendanceDate.value).subscribe(data => {
      console.log('Update activity list');
      this.activities = data;
    }, error => {
      console.log(error);
    });
  }

  bookActivity(activityId: number): void {
    this.civitatisAPIService.createBooking(activityId, this.attendanceNumber.value, this.attendanceDate.value).subscribe(data => {
      console.log(data);
      alert('Your activity '+ activityId +' has been booked successfully');
      this.civitatisAPIService.getActivities().subscribe(data => {
        this.activities = data;
      }, error => {
        console.log(error);
      });
    }, error => {
      alert('The provided date is not valid for this activity');
    });
  }

}
