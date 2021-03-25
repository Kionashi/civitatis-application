export class Booking {

  constructor(
    private _id: number | null,
    private _activityId: number,
    private _attendanceNumber: number,
    private _totalPrice: number,
    private _bookingDate: Date
  ) {
  }

  public get bookingDate(): Date {
    return this._bookingDate;
  }
  public set bookingDate(value: Date) {
    this._bookingDate = value;
  }

  public get totalPrice(): number {
    return this._totalPrice;
  }
  public set totalPrice(value: number) {
    this._totalPrice = value;
  }

  public get attendanceNumber(): number {
    return this._attendanceNumber;
  }
  public set attendanceNumber(value: number) {
    this._attendanceNumber = value;
  }

  public get activityId(): number {
    return this._activityId;
  }
  public set activityId(value: number) {
    this._activityId = value;
  }

  public get id(): number | null {
    return this._id;
  }
  public set id(value: number | null) {
    this._id = value;
  }

}
