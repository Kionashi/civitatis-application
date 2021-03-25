import { TestBed } from '@angular/core/testing';

import { CivitatisAPIService } from './civitatis-api.service';

describe('CivitatisAPIService', () => {
  let service: CivitatisAPIService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(CivitatisAPIService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
