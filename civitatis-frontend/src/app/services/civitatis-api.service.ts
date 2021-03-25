import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Activity } from '../model/activity';
import { Booking } from '../model/booking';

@Injectable({
  providedIn: 'root'
})
export class CivitatisAPIService {

  readonly baseUrl: string = 'http://localhost:8000/';

  constructor(
    private http: HttpClient,
  ) { }

  getActivities(activityDate?: Date): Observable<Activity[]> {
    let url = this.baseUrl + 'activities';

    // Validate if has activityDate setted
    if (activityDate !== null && activityDate !== undefined) {
      url += '?activityDate=' + activityDate.toISOString().slice(0,10); // Format date
    }

    // Call API
    return this.http.get<Activity[]>(url);
  }

  getActivity(activityId: number): Observable<any> {
    return this.http.get<any>(this.baseUrl + 'activities/' + activityId);
  }

  createBooking(activityId: number, attendanceNumber: number, attendanceDate: Date): Observable<Booking> {
    const body = {
       activityId: activityId,
       attendanceNumber: attendanceNumber,
       attendanceDate: attendanceDate.toISOString().slice(0,10) // Format date
    };
    console.log('sending request');
    console.log(body);

    // Call API
    return this.http.post<any>(this.baseUrl + 'bookings', body);
  }
}
