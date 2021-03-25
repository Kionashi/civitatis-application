import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Activity } from 'src/app/model/activity';
import { CivitatisAPIService } from 'src/app/services/civitatis-api.service';

@Component({
  selector: 'app-activity-detail',
  templateUrl: './activity-detail.component.html',
  styleUrls: ['./activity-detail.component.scss']
})
export class ActivityDetailComponent implements OnInit {

  activity: Activity;

  constructor(
    private civitatisAPIService: CivitatisAPIService,
    private activatedRoute: ActivatedRoute,
    private router: Router
  ) {
    this.activity = new Activity(0, 'This is a title','This is an awesome description',0, new Date(), new Date());
  }

  ngOnInit(): void {
    const activityId: number = Number(this.activatedRoute.snapshot.paramMap.get('activityId'));

    this.civitatisAPIService.getActivity(activityId).subscribe(data => {
      console.log(data);

      this.activity = data;
      this.activity.startDate = data.start_date;
      this.activity.endDate = data.end_date;
    }, error => {
      this.router.navigate(['/not-found']);
    });
  }

}
